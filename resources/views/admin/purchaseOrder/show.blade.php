@extends('layouts.admin')
@section('content')
    <div class="card">
        <form id="add_purchase_order_form">
            @csrf
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        View Order Details
                    </div>

                </div>
            </div>
            <div class="card-body" style="width: 100%;overflow-x: auto;">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <b>Date : </b> {{ $userData->date }}
                    </div>


                    <div class="col-md-4 col-sm-12">
                        <b>Supplier : </b> {{ $userData->supplier_name }}
                    </div>
                    <div class="col-md-4 col-sm-12 ">
                        <b>User : </b> {{ $userData->user_name }}
                    </div>

                </div>
                <hr>
                <table class="table datatable table-bordered text-center add-stock-table table-sm" style="width: 100%">
                    <thead>
                        <th><label for="barcode">Product</label></th>
                        <th><label for="select_product_id">Barcode</label></th>
                        <th><label for="buying_price">{{ trans('cruds.addStock.fields.buying_price') }}</label></th>
                        <th><label for="selling_price">{{ trans('cruds.addStock.fields.selling_price') }}</label></th>
                        <th><label for="select_product_id">Quantity</label></th>
                    </thead>
                    <tbody>
                        @foreach ($products as $data)
                            <tr>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->barcode }}</td>
                                <td>{{ $data->buying_price }}</td>
                                <td>{{ $data->selling_price }}</td>
                                <td>{{ $data->quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </form>
    </div>
@endsection
