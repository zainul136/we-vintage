@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.removeStock.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.remove-stocks.update", [$removeStock->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="barcode">{{ trans('cruds.removeStock.fields.barcode') }}</label>
                <input class="form-control {{ $errors->has('barcode') ? 'is-invalid' : '' }}" type="text" name="barcode" id="barcode" value="{{ old('barcode', $removeStock->barcode) }}">
                @if($errors->has('barcode'))
                    <span class="text-danger">{{ $errors->first('barcode') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.removeStock.fields.barcode_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="quantity">{{ trans('cruds.removeStock.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', $removeStock->quantity) }}" step="1" required>
                @if($errors->has('quantity'))
                    <span class="text-danger">{{ $errors->first('quantity') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.removeStock.fields.quantity_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="select_product_id">{{ trans('cruds.removeStock.fields.select_product') }}</label>
                <select class="form-control select2 {{ $errors->has('select_product') ? 'is-invalid' : '' }}" name="select_product_id" id="select_product_id" required>
                    @foreach($select_products as $id => $entry)
                        <option value="{{ $id }}" {{ (old('select_product_id') ? old('select_product_id') : $removeStock->select_product->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('select_product'))
                    <span class="text-danger">{{ $errors->first('select_product') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.removeStock.fields.select_product_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rack_no">{{ trans('cruds.removeStock.fields.rack_no') }}</label>
                <input class="form-control {{ $errors->has('rack_no') ? 'is-invalid' : '' }}" type="text" name="rack_no" id="rack_no" value="{{ old('rack_no', $removeStock->rack_no) }}">
                @if($errors->has('rack_no'))
                    <span class="text-danger">{{ $errors->first('rack_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.removeStock.fields.rack_no_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection