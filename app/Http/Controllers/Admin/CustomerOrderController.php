<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    public function index()
    {
        return view('admin.customerOrder.index');
    }

    public function create()
    {
        return view('admin.customerOrder.create');
    }
    public function show()
    {
        return view('admin.customerOrder.show');
    }
    public function swaps()
    {
        return view('admin.customerOrder.swaped');
    }
    public function swaped_view()
    {
        return view('admin.customerOrder.swap_view');
    }
    public function return()
    {
        return view('admin.customerOrder.returned');
    }
    public function return_view()
    {
        return view('admin.customerOrder.returned_view');
    }
}
