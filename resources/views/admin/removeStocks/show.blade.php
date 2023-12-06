@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.removeStock.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.remove-stocks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.removeStock.fields.id') }}
                        </th>
                        <td>
                            {{ $removeStock->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.removeStock.fields.barcode') }}
                        </th>
                        <td>
                            {{ $removeStock->barcode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.removeStock.fields.quantity') }}
                        </th>
                        <td>
                            {{ $removeStock->quantity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.removeStock.fields.select_product') }}
                        </th>
                        <td>
                            {{ $removeStock->select_product->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.removeStock.fields.rack_no') }}
                        </th>
                        <td>
                            {{ $removeStock->rack_no }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.remove-stocks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection