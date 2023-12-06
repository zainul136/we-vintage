<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAddStockRequest;
use App\Http\Requests\StoreAddStockRequest;
use Gate;
use Illuminate\Http\Request;
use PHPShopify\ShopifySDK;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Signifly\Shopify\Support\Facades\Shopify;
use Symfony\Component\HttpFoundation\Response;

class AddStockController extends Controller
{


    protected $shopify;
    private $apiKey = '593f411f60906a80466f128a3b0eb576';
    private $shopifyToken = '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';
    private $apiSecretKey = 'c7501b613dcc133c77617126a1158a35';
    private $shopifyStore = 'wevintageclient.myshopify.com';

    public function __construct()
    {

        $this->shopify = app('shopify');
    }
    public function index()
    {
        abort_if(Gate::denies('add_stock_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // Construct the API endpoint URL
        $api_endpoint = "admin/api/2023-01/inventory_levels.json";

        // Create the API URL
        $url = "https://{$this->shopifyStore}.myshopify.com/{$api_endpoint}";

        // Make the API request using Laravel's HTTP facade
        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'X-Shopify-Access-Token' => $this->shopifyToken, // Use your access token
            ])->get($url);

            if ($response->successful()) {
                $inventoryData = $response->json();

                // Pass the inventory data to the view
                return view('admin.addStocks.index')->with('inventory', $inventoryData);
            } else {
                // Handle API request errors
                return view('admin.addStocks.index')->with('inventory', null);
            }
        } catch (\Exception $e) {
            // Handle any exceptions (e.g., network errors)
            return view('admin.addStocks.index')->with('inventory', null);
        }
    }

    public function create()
    {
        abort_if(Gate::denies('add_stock_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = $this->shopify->getProducts();

        return view('admin.addStocks.create', compact('products'));

    }

    public function store(Request $request)
    {
        // Retrieve data from the form
        $productIds = $request->input('product');
        $variants = $request->input('variant');
        $quantities = $request->input('quantity');
        $date = $request->input('date');

        $errors = [];

        // Retrieve the location ID from Shopify
        try {
            $locations = Shopify::shop();
            dd($locations);

            if (!empty($locations)) {
                $locationId = $locations[0]['id']; // Assuming you want the first location
            } else {
                return redirect()->back()->with('error', 'No locations found for the shop.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to retrieve location ID: ' . $e->getMessage());
        }

        // Loop through the selected products and adjust inventory levels
        foreach ($productIds as $key => $productId) {
            $data = [
                'date' => $date,
                'location_id' => $locationId,
                'inventory_item_id' => $variants[$key],
                'available' => $quantities[$key],
            ];

            $json_data = json_encode($data);

            $api_endpoint = "admin/api/2023-01/inventory_levels/set.json";

            // Create the API URL
            $url = "https://{$this->shopifyStore}/{$api_endpoint}";
            dd($url);

            // Make the API request using Laravel's HTTP facade
            try {
                $response = Http::withHeaders([
                    'Content-Type' => 'application/json',
                    'X-Shopify-Access-Token' => $this->shopifyToken, // Use your access token
                ])->put($url, $json_data);

                // Log the API response for debugging
                \Log::info('Shopify API Response: ' . $response->status() . ' - ' . $response->body());

                if ($response->failed()) {
                    // An error occurred with the Shopify API request
                    $errors[] = 'Failed to adjust inventory for product ID ' . $productId;
                }
            } catch (\Exception $e) {
                // Handle any exceptions (e.g., network errors)
                $errors[] = 'Exception: ' . $e->getMessage();
            }
        }

        // Check if there were any errors
        if (!empty($errors)) {
            // Handle the errors (e.g., log them, return a response, etc.)
            // For example, you can redirect back with an error message
            return redirect()->back()->with('error', 'Inventory adjustment errors: ' . implode(', ', $errors));
        }

        // If there were no errors, you can redirect or return a success response
        return redirect()->route('your_success_route')->with('success', 'Inventory adjusted successfully');
    }



    public function edit()
    {


    }

    public function update()
    {

    }

    public function show( )
    {


    }

    public function destroy()
    {

    }

    public function massDestroy(MassDestroyAddStockRequest $request)
    {

    }

    public function view()
    {
        return view('admin.addStocks.show');
    }

    public function zip_broken()
    {
        return view('admin.addStocks.zip_broken');
    }
    public function stained_items()
    {
        return view('admin.addStocks.stained_items');
    }
    public function zip_broken_view()
    {
        return view('admin.addStocks.zip_broken_view');
    }
}
