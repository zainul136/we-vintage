<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Gate;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\ShopifyProduct;
use JetBrains\PhpStorm\NoReturn;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{

    protected $shopify;
    public function __construct()
    {

        $this->shopify = app('shopify');
    }
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {

        abort_if(Gate::denies('product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productsArray = $this->shopify->paginateProducts();


        return view('admin.products.index', compact('productsArray'));
    }

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {

        abort_if(Gate::denies('product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $collections = $this->shopify->getCustomCollections();

        return view('admin.products.create', compact('collections'));
    }

    public function store(Request $request)
    {

        // set product info
        $productInfo = [
            'title' => $request->name,
            'body_html' => $request->body_html,
            'vendor' => $request->vendor,
            'product_type' => $request->product_type,
            'status' => $request->status,
            'tags' => isset($request->tags) && !empty($request->tags) ? implode(',', $request->tags) : '',
        ];

        // store product
        $product = $this->shopify->createProduct($productInfo);
        $customFields = new ShopifyProduct();{
            $customFields->product_id = $product->id;
            $customFields->best_product = $request->best_product;
            $customFields->alert_qty = $request->alert_qty;
            $customFields->save();
        }

        // store product variants
        foreach ($request->variants['price'] as $key => $variantPrice) {

            $variantTitle = $request->variants['title'][$key];
            $variantSKU = $request->variants['sku'][$key];

            $productVariant =  [
                'option1' => $variantTitle,
                'sku' => $variantSKU,
                'price' => $variantPrice,
            ];

            $this->shopify->createVariant($product['id'], $productVariant);
        }
        // $product = Product::create($request->all());
        // $product->product_size = $request['hidden-product_size'];
        // $product->save();
        return redirect()->route('admin.products.index');
    }

    public function edit($id)
    {

        $product = $this->shopify->getProduct($id);
        $customFieldsProduct = ShopifyProduct::query()->where('product_id','=',$id)->first();
        $collections = $this->shopify->getCustomCollections();
        return view('admin.products.edit', compact('product', 'collections','customFieldsProduct'));
    }

    public function getVariants(Request $request): JsonResponse
    {
        $product_id = $request->product_id;
        $product = $this->shopify->getProduct($product_id);

        // Filter out variants with title "Default Title"
        $filteredVariants = array_filter($product->variants, function ($variant) {
            return $variant['title'] !== "Default Title";
        });

        return response()->json(['status' => true, 'data' => array_values($filteredVariants)]);
    }

    public function update(Request $request): RedirectResponse
    {

        // set product info
        $productInfo = [

            'title' => $request->name,
            'body_html' => $request->body_html,
            'vendor' => $request->vendor,
            'product_type' => $request->product_type,
            'status' => $request->status,
            'tags' => isset($request->tags) && !empty($request->tags) ? implode(',', $request->tags) : '',

        ];

        // update product
        $product = $this->shopify->updateProduct($request->product_id, $productInfo);
        $updateCustomFields = ShopifyProduct::query()->where('product_id','=',$product->id)->first();
        $updateCustomFields->alert_qty = $request->alert_qty;
        $updateCustomFields->best_product = $request->best_product;
        $updateCustomFields->save();
        if ($request->variants) {

            // update product variants
            foreach ($request->variants['price'] as $key => $variantPrice) {
                $variantTitle = $request->variants['title'][$key];
                $variantSKU = $request->variants['sku'][$key];
                $variantID = $request->variants['id'][$key];

                $productVariant =  [
                    'option1' => $variantTitle,
                    'sku' => $variantSKU,
                    'price' => $variantPrice,
                ];
                if ($variantID) {
                    $this->shopify->updateVariant($variantID, $productVariant);
                } else {
                    $this->shopify->createVariant($product['id'], $productVariant);
                }
            }
        }
        return redirect()->route('admin.products.index');
    }

    public function deleteVariant(Request $request): JsonResponse
    {
        $product_id = $request->product_id;
        $variant_id = $request->variant_id;
        if ($variant_id) {
            $this->shopify->deleteVariant($product_id, $variant_id);
        }
        return response()->json(['status' => true]);
    }

    public function show($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $product = $this->shopify->getProduct($id);
        return view('admin.products.show', compact('product'));
    }

    public function delete(Request $request): JsonResponse
    {
        $this->shopify->deleteProduct($request->id);
        return response()->json(['status' => true, 'message' => 'Customer Deleted Successfully!']);
    }
    public function massDestroy(MassDestroyProductRequest $request): Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        // $products = Product::find(request('ids'));

        // foreach ($products as $product) {
        //     $product->delete();
        // }

        // return response(null, Response::HTTP_NO_CONTENT);
    }

    public function find(Request $request): JsonResponse
    {
        // if ($request->has('quantity')) {
        //     $add_qty = AddStockLogs::where('barcode_id', $request->barcode_id)->whereIn('status', ['Stored', 'Added'])->sum('quantity');
        //     $remove_qty = RemoveStockLog::where('barcode_id', $request->barcode_id)->sum('quantity');
        //     $minus = $remove_qty + $request->quantity;
        //     if ($add_qty >= $minus) {
        //         $product = Product::where('id', $request->barcode_id)->first();
        //     } else {
        //         return response()->json(['remaining' => $add_qty - $remove_qty, 'status' => 'false']);
        //     }
        // } elseif ($request->has('product_id')) {
        //     $product = Product::where('id', $request->product_id)->first();
        // } else {
        //     $product = Product::where('barcode', $request->barcode)->first();
        // }
        // if ($product) {
        //     return response()->json(['product' => $product, 'status' => 'true']);
        // } else {
        //     return response()->json(['status' => 'false', 'msg' => 'Product Not Found']);
        // }
    }

    /**
     * @param UpdateProductRequest $request
     * @return string
     */

    #[NoReturn] public function storeImages(Request $request)
    {


        // return $request;

        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $fileSize = $file->getSize();
        // $fileSizeMB = $fileSize / 1048576; // convert bytes to MB
        $file_types = array('png', 'jpg', 'jpeg', 'mp4');



        // if (in_array($extension, $file_types)) {

        // if ($fileSizeMB <= 25) {
        // $extension = $file->getClientOriginalExtension();
        $filename = time() . rand(100, 99999999) . '.' . $extension;
        dd($filename);
        // $file->move(public_path("customer/docs/"), $filename);

        // $docs = new Documents();
        // $docs->filename = $filename;
        // $docs->save();

        return $filename;
        // }
        // }
    }
    public function productAndBarcodeImagesForUpdate(UpdateProductRequest $request, Product $product): void
    {
    }

    public function productAndBarcodeImagesForStore(StoreProductRequest $request, Product $product): void
    {
    }

    public function getVariantsByProductId($productId): JsonResponse
    {

        $variants = $this->shopify->getVariants($productId);

        return response()->json(['variants' => $variants],200);

    }

}
