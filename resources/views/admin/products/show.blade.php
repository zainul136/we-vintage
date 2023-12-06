@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Product View
        </div>

        <div class="card-body">

            {{-- <div class="row justify-content-center">
                <div class="col-ms-12 ">
                    <img style="height: 60px;
            width: 60px;
            object-fit: cover;"
                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/1200px-Default_pfp.svg.png"
                        alt="">
                </div>
            </div> --}}
            <div class="table-responsive">
                <table class=" table datatable table-bordered table-striped table-hover datatable datatable-AddStock">
                    <tbody>
                        <tr>

                            <th>Product</th>
                            <td>{{ $product->title ?? '' }}</td>

                        </tr>
                        <tr>

                            <th>Best Selling Product</th>
                            <td>YES</td>

                        </tr>
                        <tr>

                            <th>Low Alert Qty</th>
                            <td>10</td>

                        </tr>
                        <tr>

                            <th>Vendor</th>
                            <td>{{ $product->vendor ?? '' }}</td>

                        </tr>
                        <tr>

                            <th>Product type</th>
                            <td>{{ $product->product_type ?? '' }}</td>

                        </tr>

                    </tbody>


                </table>
                <hr>
                <div class="row mt-2 mv-b">
                    <div class="col-sm-12"><label for="desc">Description</label></div>
                    <div class="col-sm-12">
                        <p>{!! $product->body_html !!}</p>
                    </div>
                </div>
                <hr>

                <table class=" table datatable table-bordered table-striped table-hover datatable datatable-AddStock">
                    <thead>
                        <tr>

                            <th>
                                Variants
                            </th>
                            <th>
                                Sku
                            </th>
                            <th>
                                Price
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($product->variants as $variant)
                            @if ($variant['title'] !== 'Default Title')
                                <tr>
                                    <td>{{ $variant['title'] ?? '' }}</td>
                                    <td>{{ $variant['sku'] ?? '' }}</td>
                                    <td>{{ $variant['price'] ?? '' }}</td>
                                </tr>
                            @endif
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
        $(function() {

            $('.datatable-AddStock').DataTable()

        })
    </script>
@endsection
