<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Gate;

use Symfony\Component\HttpFoundation\Response;


class AvailableStockController extends Controller
{
    public function index()
    {

        return view('admin.availableStocks.index');
    }


    public function create()
    {
        abort_if(Gate::denies('available_stock_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.availableStocks.create');
    }

    public function store()
    {


        return redirect()->route('admin.available-stocks.index');
    }

    public function edit()
    {
        abort_if(Gate::denies('available_stock_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.availableStocks.edit', compact('availableStock'));
    }

    public function update()
    {


        return redirect()->route('admin.available-stocks.index');
    }

    public function show()
    {
        abort_if(Gate::denies('available_stock_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.availableStocks.show', compact('availableStock'));
    }

    public function destroy()
    {
        abort_if(Gate::denies('available_stock_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');



        return back();
    }

    public function massDestroy()
    {


        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function view()
    {
        return view('admin.availableStocks.show');
    }
}
