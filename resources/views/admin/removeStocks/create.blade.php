@extends('layouts.admin')
@section('content')
    <style>
        #qr-reader__dashboard_section_csr button {
            background: #1f89e5;
            border: none;
            color: white;
        }

        #qr-reader div span a {
            visibility: hidden;
        }

        @media screen and (max-width:425px) {
            #qr-reader {
                display: block !important;
            }
        }
    </style>
    <div class="card">
        <form id="add_stock_form">
            @csrf
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        Remove Stock
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <div class="row">
                            <div class="col-md-4">
                                {{-- <input type="text" name="order_no" class="form-control" value=""
                                    placeholder="Remove Stock #"> --}}
                            </div>
                            <div class="col-md-4 col-sm-12 mb-2">
                                <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}">
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <input type="submit" class="btn btn-success btn-sm" value="Submit">
                                <div class="btn btn-danger btn-sm add-row">Add Row</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 add_stock_notify"></div>
                </div>
            </div>
            <div class="card-body" style="width: 100%;overflow-x:auto">
                <div id="qr-reader" style="width: 300px;display:none"></div>
                <table class="table table-border text-center add-stock-table" style="width: 100%">
                    <thead>
                        <th width="20%"><label for="select_product_id">Product Name</label></th>
                        <th width="20%"><label for="select_product_id">Variants</label></th>
                        <th width="20%"><label class="required" for="quantity">Qty</label></th>
                        <th width="20%"><label for="buying_price">Price</label></th>
                        <th width="20%"><label for="selling_price">Reason</label></th>
                        <th width="10%"><label for="select_product_id">Action</label></th>
                    </thead>
                    <tbody>
                        <tr class="rows">
                            <td class="product_col">
                                <select class="form-control product select2" name="product[]" id="products" required>
                                    <option value="1">Select Product</option>
                                    <option value="2">Shoes</option>
                                    <option value="3">Watch</option>
                                    <option value="4">Shirts</option>
                                </select>
                            </td>
                            <td class="variant_col">
                                <select class="form-control variant select2" name="variant[]" id="variant" required>
                                    <option value="">Select Variant</option>
                                    <option value="1">10</option>
                                    <option value="2">20</option>
                                    <option value="3">30</option>
                                    <option value="4">40</option>
                                    <option value="5">50</option>

                                </select>
                            </td>
                            <td class="quantity_col">
                                <input type="number" name="quantity[]" id="" class="form-control quantity"
                                    min="1" value="1" required>
                            </td>
                            <td class="buying_col">
                                <input type="text" name="buying_price[]" id="buying_price"
                                    class="form-control buying_price" required readonly>
                            </td>

                            <td class="">
                                <input type="text" name="reason[]" id="reason" class="form-control reason" required>
                            </td>
                            <td>
                                {{-- <label for="" class="text-danger">Delete</label> --}}
                                {{-- <div class="btn btn-danger btn-sm" disabled>Add Row</div> --}}
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"> <span style="float: right">Total:</span></td>
                            <td class="quantity_col">
                                <input type="number" name="quantity[]" id="" class="form-control quantity"
                                    min="1" value="" readonly>
                            </td>
                            <td class="buying_col">
                                <input type="text" name="buying_price[]" id="buying_price"
                                    class="form-control buying_price" readonly>
                            </td>
                        </tr>
                    </tfoot>
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
                    <td class="product_col">
                        <select class="form-control product select3" name="product[]" id="products" required>
                                    <option value="1">Select Product</option>
                                    <option value="2">Shoes</option>
                                    <option value="3">Watch</option>
                                    <option value="4">Shirts</option>
                                </select>
                    </td>
                    <td class="variant_col">
                                <select class="form-control variant select3" name="variant[]" id="variant" required>
                                    <option value="">Select Variant</option>
                                    <option value="1">10</option>
                                    <option value="2">20</option>
                                    <option value="3">30</option>
                                    <option value="4">40</option>
                                    <option value="5">50</option>

                                </select>
                            </td>
                    <td class="quantity_col">
                        <input type="number" name="quantity[]" id="" class="form-control quantity"
                                    min="1" value="1" required>
                    </td>
                    <td class="buying_col">
                        <input type="text" name="buying_price[]" id="buying_price"
                                    class="form-control buying_price" required readonly>
                    </td>
                    <td class="">
                                <input type="text" name="reason[]" id="reason" class="form-control reason" required>
                            </td>                
                    <td>
                        <div class="btn btn-danger btn-sm delete-row">Delete</div>
                    </td>
                </tr>
            
            `;
                $("table tbody").append(row);
                $(".select3").select2();

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
                let product_name = $(this).parent().siblings('.product_col').children('.product').val(
                    '');
                let buying = $(this).parent().siblings('.buying_col').children('.buying_price').val('');
                let selling = $(this).parent().siblings('.selling_col').children('.selling_price').val('');

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
                            $(product_name).val(response.product.id);
                            $(buying).val(response.product.buying_price);
                            $(selling).val(response.product.selling_price);

                            if (!$('.barcode').last().val()) { // check if last row is empty
                                return; // exit function
                            } else {
                                $(".add-row").click();
                            }
                        } else if (response.status == "false") {
                            console.log(response.msg);
                        }
                    }
                });
            });

            $(document).on("change", ".product", function() {
                let product_id = $(this).val();
                let barcode = $(this).parent().siblings('.barcode_col').children('#barcode').val('');
                let barcode_id = $(this).parent().siblings('.barcode_col').children('#barcode_id').val('');
                let buying = $(this).parent().siblings('.buying_col').children('#buying_price').val('');
                let selling = $(this).parent().siblings('.selling_col').children('#selling_price').val('');
                $.ajax({
                    url: "{{ route('admin.products.get') }}",
                    type: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        product_id: product_id,
                    },
                    success: function(response) {
                        if (response.status == "true") {
                            $(barcode).val(response.product.barcode);
                            $(barcode_id).val(response.product.id);
                            $(buying).val(response.product.buying_price);
                            $(selling).val(response.product.selling_price);

                            if (!$('.barcode').last().val()) { // check if last row is empty
                                return; // exit function
                            } else {
                                $(".add-row").click();
                            }
                        } else if (response.status == "false") {
                            console.log(response.msg);
                        }
                    }
                });
            });
        });
    </script>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            // Fill the barcode value

            // Find the last appended row and its barcode field
            var lastAppendedRow = $('.rows').last();
            var lastAppendedBarcode = lastAppendedRow.find('.barcode').val(decodedText);

            // Trigger the keyup event on the last appended barcode field
            lastAppendedBarcode.trigger('keyup');
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", {
                fps: 10,
                qrbox: 250
            });
        html5QrcodeScanner.render(onScanSuccess);
    </script>
    <script>
        $(document).ready(function() {
            $(document).on("submit", "#add_stock_form", function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "{{ route('admin.stocks.store') }}",
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
                            window.location = "{{ route('admin.stocks.index') }}"
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
