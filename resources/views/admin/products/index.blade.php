@extends('layouts.admin')
@section('content')
    @can('product_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.products.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.product.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.product.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" datatable table table-bordered table-striped table-hover datatable datatable-Product">
                    <thead>
                        <tr>

                            <th>
                                ID
                            </th>
                            <th>
                                Product
                            </th>
                            <th>
                                Vendor
                            </th>
                            <th>
                                Best Product
                            </th>
                            <th>
                                Type
                            </th>
                            <th width="15%">
                                Low Alert Qty
                            </th>

                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productsArray as $key => $products)
                        @foreach ($products as $key1 => $product)
                            <tr>
                                <td>
                                    {{ $key + 1 }}
                                </td>
                                <td>
                                    {{ $product->title ?? '' }}
                                </td>
                                <td>
                                    {{ $product->vendor ?? '' }}
                                </td>
                                <td>
                                    @php
                                    $customFields = App\Models\ShopifyProduct::query()->where('product_id', $product->id)->first();
                                    $bestProduct = $customFields->best_product ?? '';
                                    @endphp
                                    @if($bestProduct == 1)
                                        Yes
                                    @else
                                        No
                                    @endif
                                </td>
                                <td>
                                    {{ ucfirst($product->product_type) ?? '' }}
                                </td>

                                <td>{{$customFields->alert_qty ?? ''}}</td>
                                <td>
                                    @can('product_show')
                                        <a class="btn btn-xs btn-primary"
                                            href="{{ route('admin.products.show', $product->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('product_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.products.edit', $product->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('product_delete')
                                        <a href="javascript:void(0)" class="btn btn-xs btn-danger mx-1 show_confirm"
                                            data-id="{{ $product->id ?? '' }}"> Delete</a>
                                    @endcan

                                </td>

                            </tr>

                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script>
        $('.show_confirm').click(function(event) {
            event.preventDefault();
            Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        let id = $(this).attr("data-id");
                        $.ajax({
                            url: "{{ route('admin.products.delete') }}",
                            type: 'delete',
                            cache: false,
                            data: {
                                _token: '{{ csrf_token() }}',
                                'id': id,
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    'Product has been deleted.',
                                    'success'
                                );
                                location.reload();
                            }
                        })
                    }
                });
        });
    </script>
@endsection
