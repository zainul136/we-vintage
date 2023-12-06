@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            View Returned Order Items
        </div>

        <div class="card-body">
            {{-- <p>
            Text coming soon...
        </p> --}}
            <div class="table-responsive">
                <table class=" table datatable table-bordered table-striped table-hover datatable datatable-AddStock">
                    <thead>
                        <tr>
                            <th>

                            </th>
                            <th>
                                Product
                            </th>
                            <th>
                                Variant
                            </th>
                            <th>
                                Quantity
                            </th>
                            <th>
                                Price
                            </th>
                            <th>
                                Total Price
                            </th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td>Shoes</td>
                            <td>10</td>
                            <td>2</td>
                            <td>300</td>
                            <td>600</td>
                            <td><button class="btn btn-sm btn-primary">Add to Inventory</button></td>
                        </tr>

                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"> <span style="float: right">Total:</span></td>
                            <td>
                                1
                            </td>
                            <td class="">
                                200
                            </td>
                            <td class="">
                                400
                            </td>
                            <td></td>
                        </tr>
                    </tfoot>
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
