<?php

namespace App\Http\Controllers\Admin;

use App\Models\Supplier;

class HomeController
{
    protected $shopify;
    public function __construct()
    {

        $this->shopify = app('shopify');
    }
    public function index()
    {
        $Supplier = Supplier::count();
        $Employees = 10;
        $Products =  $this->shopify->getProductsCount();
        return view('home', compact('Supplier', 'Employees', 'Products'));
    }
}
