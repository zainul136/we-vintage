<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class StockOutController extends Controller
{
    public function index(Request $request)
    {
      
        return view('admin.stockOuts.index');
    }

    public function create()
    {
        abort_if(Gate::denies('stock_out_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stockOuts.create');
    }

    public function store()
    {
        

        return redirect()->route('admin.stock-outs.index');
    }

    public function edit()
    {
        abort_if(Gate::denies('stock_out_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stockOuts.edit');
    }

    public function update()
    {
     
        return redirect()->route('admin.stock-outs.index');
    }

    public function show()
    {
        abort_if(Gate::denies('stock_out_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stockOuts.show');
    }

    public function destroy()
    {
        abort_if(Gate::denies('stock_out_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

       
        return back();
    }

    public function massDestroy(Request $request)
    {
       
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
