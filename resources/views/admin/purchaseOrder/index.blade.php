@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Purchase Order
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="datatable  table table-bordered table-striped table-hover">
                    <thead>
                        <th>DATE</th>
                        <th>Order Number</th>
                        <th>Supplier</th>
                        <th>ADDED BY</th>
                        <th>TOTAL PRODUCT</th>
                        <th>STATUS</th>
                        <th>ACTIONS</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>10-20-2023</td>
                            <td>000-912</td>
                            <td>Test</td>
                            <td>Admin</td>
                            <td>5</td>
                            <td>
                                <label for="" class="text-success">Added</label>
                            </td>
                            <td>
                                <a href="{{ route('admin.stock.view') }}"><button type="button" value="View"
                                        class="btn btn-primary btn-sm">View</button></a>
                            </td>
                        </tr>
                        <tr>
                            <td>10-21-2023</td>
                            <td>000-092</td>
                            <td>Test</td>
                            <td>Admin</td>
                            <td>3</td>
                            <td>
                                <label for="" class="text-secondary">Pending</label>
                            </td>
                            <td>
                                <a href="{{ route('admin.stock.view') }}"><button type="button" value="View"
                                        class="btn btn-primary btn-sm">View</button></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
