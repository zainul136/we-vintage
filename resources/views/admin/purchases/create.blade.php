@extends('layouts.admin')
@section('content')
    <div class="card">
        <form id="add_stock_form">
            @csrf
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        Create Purchase Stock In
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <div class="row">
                            <div class="col-md-8 col-md-6"></div>
                            <div class="col-md-4 col-sm-6">
                                <input type="submit" class="btn btn-success btn-sm" value="Submit">
                                <div class="btn btn-danger btn-sm add-row">Add Row</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-md-6">
                                <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}">
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <select name="" id=""></select>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 add_stock_notify"></div>
                </div>
            </div>
            <div class="card-body" style="width: 100%;overflow-x: auto;">
                <table class="table table-border text-center add-stock-table" style="width: 100%">
                    <thead>
                        <th width="20%"><label for="barcode">{{ trans('cruds.addStock.fields.barcode') }}</label></th>
                        <th width="20%"><label class="required"
                                for="quantity">{{ trans('cruds.addStock.fields.quantity') }}</label></th>
                        <th width="20%"><label for="select_product_id">Product Name</label></th>
                        <th width="20%"><label
                                for="buying_price">{{ trans('cruds.addStock.fields.buying_price') }}</label></th>
                        <th width="20%"><label
                                for="selling_price">{{ trans('cruds.addStock.fields.selling_price') }}</label></th>
                        <th width="10%"><label for="select_product_id">Action</label></th>
                    </thead>
                    <tbody>
                        <tr class="rows">
                            <td class="barcode_col">
                                <input type="text" name="barcode[]" id="barcode" class="form-control barcode" required>
                                <input type="hidden" name="barcode_id[]" id="barcode_id" class="form-control barcode_id"
                                    required>
                            </td>
                            <td class="quantity_col">
                                <input type="number" name="quantity[]" id="" class="form-control quantity"
                                    min="1" value="1" required>
                            </td>
                            <td class="product_col">
                                <input type="text" name="product[]" id="products" class="form-control" required
                                    readonly>
                            </td>
                            <td class="buying_col">
                                <input type="text" name="buying_price[]" id="buying_price"
                                    class="form-control buying_price" required readonly>
                            </td>
                            <td class="selling_col">
                                <input type="text" name="selling_price[]" id="selling_price"
                                    class="form-control selling_price" required readonly>
                            </td>
                            <td>
                                {{-- <label for="" class="text-danger">Delete</label> --}}
                                {{-- <div class="btn btn-danger btn-sm" disabled>Add Row</div> --}}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $(".add-row").click(function() {
                let row = `
                <tr class="rows">
                        <td class="barcode_col">
                            <input type="text" name="barcode[]" id="" class="form-control barcode" required>
                            <input type="hidden" name="barcode_id[]" id="barcode_id" class="form-control barcode_id" required>
                        </td>
                        <td class="quantity_col">
                            <input type="number" name="quantity[]" id="" class="form-control quantity"
                                min="1" value="1" required>
                        </td>
                        <td class="product_col">
                            <input type="text" name="product[]" id="products" class="form-control" required readonly>
                        </td>
                        <td class="buying_col">
                            <input type="text" name="buying_price[]" id="buying_price" class="form-control buying_price" required readonly>
                        </td>
                        <td class="selling_col">
                                <input type="text" name="selling_price[]" id="selling_price" class="form-control selling_price" required
                                    readonly>
                            </td>
                        <td>
                            <div class="btn btn-danger btn-sm delete-row">Delete</div>
                        </td>
                    </tr>
            
            `;
                $("table tbody").append(row);

            });
        });
        $(document).on("click", ".delete-row", function() {
            $(this).closest("tr").remove();
        });
    </script>

    <script>
        $(document).ready(function() {
            $(document).on("keyup", ".barcode", function() {
                let barcode = $(this).val();
                let barcode_id = $(this).siblings('#barcode_id').val('');
                let product_name = $(this).parent().next().next().find('#products').val('');
                let buying_price = $(this).parent().next().next().next().find("#buying_price").val('');
                let selling_price = $(this).parent().next().next().next().next().find("#selling_price").val(
                    '');
                $.ajax({
                    url: "{{ route('admin.products.get') }}",
                    type: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        barcode: barcode,
                    },
                    success: function(response) {
                        if (response.status == "true") {
                            $(barcode_id).val(response.product.id);
                            $(product_name).val(response.product.name);
                            $(buying_price).val(response.product.buying_price);
                            $(selling_price).val(response.product.selling_price);
                        }
                        if (response.status == "false") {
                            console.log(response.msg);
                        }
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(document).on("submit", "#add_stock_form", function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "{{ route('admin.add-stocks.store') }}",
                    type: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status == "true") {
                            $(".add_stock_notify").html(
                                `<div class="alert alert-success alert-dismissible fade show" role="alert">
                                  <strong>Message: </strong> ` + response.msg + `.
                                </div>
                              `), setTimeout(function() {
                                $(".add_stock_notify").html(``);
                            }, 2000);
                            window.location = "{{ route('admin.purchases.index') }}"
                        }
                        if (response.status == "false") {
                            $(".add_stock_notify").html(
                                `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  <strong>Message: </strong> ` + response.msg + `.
                                </div>
                              `), setTimeout(function() {
                                $(".add_stock_notify").html(``);
                            }, 2000);
                        }
                        if (response.status == "exists") {
                            $(".add_stock_notify").html(
                                `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  <strong>Message: </strong> ` + response.msg + `.
                                  <strong>Barcode: </strong> ` + response.barcode + `.
                                  <strong>Quantity: </strong> ` + response.quantity + `.
                                </div>
                              `), setTimeout(function() {
                                $(".add_stock_notify").html(``);
                            }, 2000);
                        }
                    }
                });

            });
        });
    </script>
@endsection
