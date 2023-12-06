@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Dashboard
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-4">
                                <div class="col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-red"
                                            style="display:flex; flex-direction: column; justify-content: center;">
                                            <i class="fa fa-chart-line"></i>
                                        </span>

                                        <div class="info-box-content">
                                            Total Products
                                            <span class="info-box-number">
                                                {{ $Products ?? 0 }}
                                            </span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->

                                    {{-- <a href="{{ route('admin.products.create') }}" class="btn btn-primary float-right"
                                        style="margin-top: -10px">
                                        <i style='font-size:18px' class='fas'>&#xf067;</i>
                                    </a> --}}
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-red"
                                            style="display:flex; flex-direction: column; justify-content: center;">
                                            <i class="fa fa-chart-line"></i>
                                        </span>

                                        <div class="info-box-content">
                                            Total Purchases
                                            <span class="info-box-number">
                                                0
                                            </span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->

                                    {{-- <a href="{{ route('admin.products.create') }}" class="btn btn-primary float-right"
                                        style="margin-top: -10px">
                                        <i style='font-size:18px' class='fas'>&#xf067;</i>
                                    </a> --}}
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="col-10">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-red"
                                            style="display:flex; flex-direction: column; justify-content: center;">
                                            <i class="fa fa-chart-line"></i>
                                        </span>

                                        <div class="info-box-content">
                                            Total Swap & Returns
                                            <span class="info-box-number">
                                                0
                                            </span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->

                                    {{-- <a href="{{ route('admin.products.create') }}" class="btn btn-primary float-right"
                                        style="margin-top: -10px">
                                        <i style='font-size:18px' class='fas'>&#xf067;</i>
                                    </a> --}}
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-red"
                                            style="display:flex; flex-direction: column; justify-content: center;">
                                            <i class="fa fa-chart-line"></i>
                                        </span>

                                        <div class="info-box-content">
                                            Stained & Repaired
                                            <span class="info-box-number">
                                                0
                                            </span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->

                                    {{-- <a href="{{ route('admin.products.create') }}" class="btn btn-primary float-right"
                                        style="margin-top: -10px">
                                        <i style='font-size:18px' class='fas'>&#xf067;</i>
                                    </a> --}}
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-red"
                                            style="display:flex; flex-direction: column; justify-content: center;">
                                            <i class="fa fa-chart-line"></i>
                                        </span>

                                        <div class="info-box-content">
                                            Broke Zip
                                            <span class="info-box-number">
                                                0
                                            </span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->

                                    {{-- <a href="{{ route('admin.products.create') }}" class="btn btn-primary float-right"
                                        style="margin-top: -10px">
                                        <i style='font-size:18px' class='fas'>&#xf067;</i>
                                    </a> --}}
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-red"
                                            style="display:flex; flex-direction: column; justify-content: center;">
                                            <i class="fa fa-chart-line"></i>
                                        </span>

                                        <div class="info-box-content">
                                            Today Purchase Amount
                                            <span class="info-box-number">
                                                0
                                            </span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->

                                    {{-- <a href="{{ route('admin.products.create') }}" class="btn btn-primary float-right"
                                        style="margin-top: -10px">
                                        <i style='font-size:18px' class='fas'>&#xf067;</i>
                                    </a> --}}
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-red"
                                            style="display:flex; flex-direction: column; justify-content: center;">
                                            <i class="fa fa-chart-line"></i>
                                        </span>

                                        <div class="info-box-content">
                                            Total Purchase Amount
                                            <span class="info-box-number">
                                                0
                                            </span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->

                                    {{-- <a href="{{ route('admin.products.create') }}" class="btn btn-primary float-right"
                                        style="margin-top: -10px">
                                        <i style='font-size:18px' class='fas'>&#xf067;</i>
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="col-12 card p-3">
                                    <h5>Low Inventory</h5>
                                    <table class="table table-bordered table-sm text-center">
                                        <thead>
                                            <th>#</th>
                                            <th>Product</th>
                                            <th>Item In Stock</th>
                                        </thead>
                                        <tbody>
                                            {{-- @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($lowStockByProduct as $productId => $data)
                                                <tr data-entry-id="{{ $productId }}">
                                                    <td>
                                                        {{ $i++ }}
                                                    </td>
                                                    <td>
                                                        {{ $data['name'] ?? '' }}
                                                    </td>
                                                    <td>
                                                        {{ $data['barcode'] ?? '' }}
                                                    </td>
                                                    <td>
                                                        {{ $data['remaining_stock'] ?? '' }}
                                                    </td>

                                                </tr>
                                            @endforeach --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
@endsection
