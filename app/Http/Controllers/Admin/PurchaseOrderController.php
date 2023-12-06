<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    public function index()
    {

        return view('admin.purchaseOrder.index');
    }

    public function create()
    {
        $suppliers = Supplier::all();

        return view('admin.purchaseOrder.create', compact('suppliers'));
    }

    function changestatus(Request $request)
    {
      
    }

    public function store(Request $request)
    {
       
    }

    public function massDestroy(Request $request)
    {
      
    }

    public function show($id)
    {
      
    }
}
