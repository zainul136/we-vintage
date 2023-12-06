<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AddStock;
use App\Models\AddStockLogs;
use App\Models\Product;
use App\Models\Supplier;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class PurchaseController extends Controller
{
    public function index(Request $request)
    {
       
        return view('admin.purchases.index');
    }

    // public function create()
    // {

    //     $select_products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

    //     return view('admin.addStocks.create', compact('select_products'));
    // }

    // public function store(Request $request)
    // {
    //     for ($i = 0; $i < count($request->barcode); $i++) {
    //         $addStock_id = AddStock::create([
    //             'date' => $request->date,
    //         ]);
    //         $result = AddStockLogs::insert([
    //             'add_stock_id' => $addStock_id->id,
    //             'barcode_id' => $request->barcode_id[$i],
    //             'quantity' => $request->quantity[$i],
    //         ]);
    //     }
    //     if ($result) {
    //         return response()->json(['status' => 'true', 'msg' => 'Stock added Successfully']);
    //     } else {
    //         return response()->json(['status' => 'false', 'msg' => 'Stock could not added Successfully']);
    //     }
    // }

    // public function edit(AddStock $addStock)
    // {

    //     $select_products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

    //     $addStock->load('select_product');

    //     return view('admin.addStocks.edit', compact('addStock', 'select_products'));
    // }

    // public function update(Request $request, AddStock $addStock)
    // {
    //     $addStock->update($request->all());

    //     return redirect()->route('admin.add-stocks.index');
    // }

    // public function show(AddStock $addStock)
    // {

    //     $addStock->load('select_product');

    //     return view('admin.addStocks.show', compact('addStock'));
    // }

    // public function destroy(AddStock $addStock)
    // {

    //     $addStock->delete();

    //     return back();
    // }

    // public function massDestroy(Request $request)
    // {
    //     $addStocks = AddStock::find(request('ids'));

    //     foreach ($addStocks as $addStock) {
    //         $addStock->delete();
    //     }

    //     return response(null, Response::HTTP_NO_CONTENT);
    // }

    // public function view()
    // {
    //     $addStocks = AddStockLogs::join('products', 'products.id', '=', 'add_stock_logs.barcode_id')
    //         ->join('add_stocks', 'add_stocks.id', '=', 'add_stock_logs.add_stock_id')
    //         ->select('products.name', 'products.barcode', 'products.buying_price', 'products.selling_price', 'add_stock_logs.quantity', 'add_stocks.date')
    //         ->get();
    //     return view('admin.addStocks.show', compact('addStocks'));
    // }
}
