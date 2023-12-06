@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Remove Stocks
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" datatable table table-bordered table-striped table-hover">
                    <thead>
                        <th>DATE</th>
                        <th>Stock Number</th>
                        <th>USER</th>
                        <th>TOTAL PRODUCT</th>
                        <th>STATUS</th>
                        <th>ACTIONS</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>10-20-2023</td>
                            <td>000-112</td>
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
                            <td>000-223</td>
                            <td>Admin</td>
                            <td>3</td>
                            <td>
                                <label for="" class="text-danger">Removed</label>
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
