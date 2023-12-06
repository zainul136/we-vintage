<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class SupplierController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $suppliers = Supplier::all();

        return view('admin.suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        return view('admin.suppliers.create', compact('roles'));
    }

    public function store(Request $request)
    {
        Supplier::insert([
            'name' => $request->name,
            'contact' => $request->contact,
            'email' => $request->email,
        ]);
        return redirect()->route('admin.suppliers.index');
    }

    public function show($supplierId)
    {
        // abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $supplier = Supplier::find($supplierId);
        return view('admin.suppliers.show', compact('supplier'));
    }

    public function edit($supplierId)
    {
        // abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $supplier = Supplier::find($supplierId);

        if (!$supplier) {
            return redirect()->back();
        } else {
            return view('admin.suppliers.edit', compact('supplier'));
        }
    }

    public function update(Request $request, $supplierId)
    {
        $supplier = Supplier::find($supplierId);
        $supplier->name = $request->input('name');
        $supplier->contact = $request->input('contact');
        $supplier->company = $request->input('company');
        $supplier->poc = $request->input('poc');
        $supplier->email = $request->input('email');
        $supplier->update();
        return redirect()->route('admin.suppliers.index');
    }

    public function destroy($supplierId)
    {
        // abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Supplier::find($supplierId)->delete();
        return back();
    }

    public function massDestroy(Request $request)
    {
        $suppliers = Supplier::find(request('ids'));

        foreach ($suppliers as $supplier) {
            $supplier->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
