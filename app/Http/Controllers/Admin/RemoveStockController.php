<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRemoveStockRequest;
use App\Http\Requests\StoreRemoveStockRequest;
use App\Http\Requests\UpdateRemoveStockRequest;

use Gate;

use Symfony\Component\HttpFoundation\Response;

class RemoveStockController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('remove_stock_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.removeStocks.index');
    }

    public function create()
    {
        abort_if(Gate::denies('remove_stock_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.removeStocks.create');
    }

    public function store(StoreRemoveStockRequest $request)
    {
    }

    public function edit()
    {
    }

    public function update(UpdateRemoveStockRequest $request)
    {

        return redirect()->route('admin.remove-stocks.index');
    }

    public function show()
    {

        return view('admin.removeStocks.show');
    }

    public function destroy()
    {
    }

    public function massDestroy(MassDestroyRemoveStockRequest $request)
    {

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
