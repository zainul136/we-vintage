@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Returned Orders
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table datatable table-bordered table-striped table-hover">
                    <thead>
                        <th>DATE</th>
                        <th>Order Number</th>
                        <th>ADDED BY</th>
                        <th>TOTAL PRODUCT</th>
                        <th>STATUS</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>10-20-2023</td>
                            <td>000-912</td>
                            <td>Admin</td>
                            <td>1</td>

                            <td>
                                <a href="{{ route('admin.customer-order.return_view') }}"><button type="button" value="View"
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
