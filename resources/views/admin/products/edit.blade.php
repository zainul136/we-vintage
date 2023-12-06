@extends('layouts.admin')
@section('content')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.css">
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.product.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="row mb-3">
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="col-md-8 mb-2">
                        <label class="required" for="name">{{ trans('cruds.product.fields.name') }}</label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                            name="name" id="name" value="{{ old('name', $product->title) }}">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.product.fields.name_helper') }}</span>
                    </div>

                    <div class="col-md-4 mb-2">
                        <label class="required" for="best_product">Collection </label>
                        <select name="collection" class="select2" id="collection">
                            <option value="">--- select ---</option>
                            @forelse ($collections as $collection)
                                <option value="{{ $collection['id'] }}"> {{ $collection['title'] }}</option>

                            @empty

                                <option value="">No collection found</option>
                            @endforelse
                        </select>
                        @if ($errors->has('collection'))
                            <span class="text-danger">{{ $errors->first('collection ') }}</span>
                        @endif
                    </div>


                    <div class="col-md-4 mt-2">
                        <label class="required" for="name">Vendor</label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                            name="vendor" id="vendor" value="{{ old('vendor', $product->vendor) }}">
                        @if ($errors->has('vendor'))
                            <span class="text-danger">{{ $errors->first('vendor') }}</span>
                        @endif

                    </div>

                    <div class="col-md-4 mt-2">
                        <label class="required" for="name">Product Type</label>
                        <input class="form-control {{ $errors->has('product_type') ? 'is-invalid' : '' }}" type="text"
                            name="product_type" id="product_type"
                            value="{{ old('product_type', $product->product_type) }}">
                        @if ($errors->has('product_type'))
                            <span class="text-danger">{{ $errors->first('product_type') }}</span>
                        @endif

                    </div>

                    <div class="col-md-4 mt-2">
                        <label class="required" for="alert_qty">Low Alert Qty</label>
                        <input class="form-control" type="number" name="alert_qty" id="alert_qty"
                               value="{{ old('alert_qty', $customFieldsProduct->alert_qty) }}">
                        @if ($errors->has('alert_qty'))
                            <span class="text-danger">{{ $errors->first('alert_qty') }}</span>
                        @endif
                    </div>
                    {{-- <div class="col-md-4">
                        <label class="required" for="best_product">Best Product</label>
                        <select name="best_product" id="" class="form-control">
                            <option value="">--- Select ---</option>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                        @if ($errors->has('best_product'))
                            <span class="text-danger">{{ $errors->first('best_product') }}</span>
                        @endif
                    </div> --}}
                    <div class="col-md-4 mt-2">
                        <label class="required" for="best_product">Low Alert Qty</label>
                        <input class="form-control" type="number" name="qty" id="qty"
                            value="{{ old('qty', '') }}">
                        @if ($errors->has('best_product'))
                            <span class="text-danger">{{ $errors->first('best_product') }}</span>
                        @endif
                    </div>
                    <div class="col-md-4 mt-2">
                        <label class="required" for="best_product">Status</label>
                        <select name="status" class="select2" id="status">
                            <option value="">--- select ---</option>
                            <option value="active" {{ $product->status == 'active' ? 'selected' : '' }}> Active </option>
                            <option value="archived" {{ $product->status == 'archived' ? 'selected' : '' }}> Archived
                            </option>
                            <option value="draft" {{ $product->status == 'draft' ? 'selected' : '' }}> Draft </option>
                        </select>

                        @if ($errors->has('status'))
                            <span class="text-danger">{{ $errors->first('status') }}</span>
                        @endif
                    </div>
                    <div class="col-md-4 mt-2">
                        <label class="required" for="best_product">Best Product</label>
                        <select name="best_product" id="" class=" select2 form-control">
                            <option value="">--- Select ---</option>
                            <option value="0" {{ $customFieldsProduct->best_product == '0' ? 'selected' : '' }}> No </option>
                            <option value="1" {{ $customFieldsProduct->best_product == '1' ? 'selected' : '' }}> Yes </option>
                        </select>
                        @if ($errors->has('best_product'))
                            <span class="text-danger">{{ $errors->first('best_product') }}</span>
                        @endif
                    </div>
                    <div class="col-md-12 mt-2 mb-2">
                        @php
                            $tags = explode(' , ', $product->tags);
                        @endphp
                        <label class="required" for="name">Tags </label>
                        <select class="form-control {{ $errors->has('tags') ? 'is-invalid' : '' }}" name="tags[]"
                            id="productTags" multiple>
                            @if ($tags[0] != '')
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag }}" selected>{{ $tag }}</option>
                                @endforeach
                            @endif
                        </select>
                        @if ($errors->has('tags'))
                            <span class="text-danger">{{ $errors->first('tags') }}</span>
                        @endif

                    </div>

                </div>

                <div class=" mt-2">
                    Add Variants
                    <div style="float: right">

                        <div class="btn btn-danger btn-sm add-row">Add Variants</div>
                    </div>
                </div>
                <table class="table table-border text-center add-stock-table" style="width: 100%">
                    <thead>
                        <th width="20%"><label for="select_product_id">Variants</label></th>
                        <th width="20%"><label for="buying_price">Sku</label></th>
                        <th width="20%"><label class="required" for="price">Price</label></th>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

                <div class="form-group">
                    <label for="body_html">Description</label>
                    <textarea class="form-control ckeditor {{ $errors->has('body_html') ? 'is-invalid' : '' }}" name="body_html"
                        id="body_html">{!! old('body_html', $product->body_html) !!}</textarea>
                    @if ($errors->has('body_html'))
                        <span class="text-danger">{{ $errors->first('body_html') }}</span>
                    @endif

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
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#productTags").select2({
                tags: true,
                width: '100%'
            })

            $.ajax({
                url: "{{ route('admin.products.getVariants') }}",
                type: 'post',
                cache: false,
                data: {
                    _token: '{{ csrf_token() }}',
                    'product_id': {{ $product->id }},
                },
                success: function(response) {
                    console.log(response);
                    $.each(response.data, function(index, variant) {
                        appendRow(variant, index === 0);
                    });
                }
            });
            $(".add-row").click(function() {
                appendRow({}, false);
            });

            function appendRow(variant, isFirst) {
                let deleteButton = isFirst ? '' : '<div class="btn btn-danger btn-sm delete-row">Delete</div>';
                let row = `
        <tr class="rows">
            <td class="variant_col">
                <input type="text" class="form-control" name="variants[title][]" value="${variant.title || ''}">
            </td>
            <input type="hidden" class="form-control variant_id" name="variants[id][]" value="${variant.id || ''}">
            <td class="sku">
                <input type="text" name="variants[sku][]" class="form-control sku" value="${variant.sku || ''}" required>
            </td>
            <td class="variant_price">
                <input type="text" name="variants[price][]" class="form-control variant_price" value="${variant.price || ''}" required>
            </td>
            <td>${deleteButton}</td>
        </tr>
    `;
                $("table tbody").append(row);
            }
        });
        $(document).on("click", ".delete-row", function() {
            var row = $(this).closest("tr");
            variant_id = row.find('.variant_id').val();
            $.ajax({
                url: "{{ route('admin.products.deleteVariant') }}",
                type: 'post',
                cache: false,
                data: {
                    _token: '{{ csrf_token() }}',
                    'product_id': {{ $product->id }},
                    'variant_id': variant_id,
                },
                success: function(response) {
                    row.remove();
                }
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            function SimpleUploadAdapter(editor) {}

            var allEditors = document.querySelectorAll('.ckeditor');
            for (var i = 0; i < allEditors.length; ++i) {
                ClassicEditor.create(
                    allEditors[i], {
                        extraPlugins: [SimpleUploadAdapter]
                    }
                );
            }
        });
    </script>
    <script>
        let file_name_arr = [];
        let file_size_arr = [];
        let file_uuid_arr = [];

        Dropzone.options.documentsDropzone = {

            url: '{{ route('admin.products.storeImages') }}',
            maxFilesize: 50, // MB
            maxFiles: 5,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            // acceptedFiles: ".pdf,.doc,docx,.xls,.xlsx",
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            params: {
                size: 50
            },
            success: function(file, response) {

                file_name_arr.push(file.xhr.response);
                file_uuid_arr.push(file.upload.uuid);
                file_size_arr.push(file.size);

                $("#filename").val(file_name_arr);
                $("#size").val(file_size_arr);
                $("#uuid").val(file_uuid_arr);


                // console.log(response,file);
                $('form').find('input[name="images"]').remove()
                $('form').append('<input type="hidden" name="images" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove();
                if (file.status !== 'error') {
                    $('form').find('input[name="images"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }

                // The string you want to find
                var searchString = file.upload.uuid;

                // Find the index where the string matches
                var matchingIndex = file_uuid_arr.indexOf(searchString);

                // remove index from array
                file_uuid_arr.splice(matchingIndex, 1);
                file_name_arr.splice(matchingIndex, 1);
                file_size_arr.splice(matchingIndex, 1);

                // if (matchingIndex !== -1) {
                //     console.log("String found at index:", matchingIndex);
                // } else {
                //     console.log("String not found in the array.");
                // }

                // reset the array's
                $("#filename").val(file_name_arr);
                $("#size").val(file_size_arr);
                $("#uuid").val(file_uuid_arr);


            },
            init: function() {
                @if (isset($customer) && $customer->documents)
                    var file = {!! json_encode($customer->documents) !!}
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="images" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif


            },

            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }


        }
    </script>
@endsection
