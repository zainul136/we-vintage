@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">

            <div class="row">
                <div class="col-md-3"> View StocK Details</div>
                <div class="col-md-3">Supplier: John</div>
                <div class="col-md-3"> Date: 10/9/2023</div>

            </div>
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
                            <th>
                                Status
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td>Shoes</td>
                            <td>10</td>
                            <td>1</td>
                            <td>300</td>
                            <td>300</td>
                            <td class="text-danger">Broken</td>
                            <td><button class="btn btn-sm btn-primary">Add to Broken</button>
                                <button class="btn btn-sm btn-warning">Add to Stained</button>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Shirts</td>
                            <td>20</td>
                            <td>1</td>
                            <td>200</td>
                            <td>200</td>
                            <td class="text-success">Good</td>
                            <td><button class="btn btn-sm btn-primary">Add to Broken</button>
                                <button class="btn btn-sm btn-warning">Add to Stained</button>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Watch</td>
                            <td>10</td>
                            <td>1</td>
                            <td>400</td>
                            <td>400</td>
                            <td class="text-dangerzip_broken">stained</td>
                            <td><button class="btn btn-sm btn-primary">Add to Broken</button>
                                <button class="btn btn-sm btn-warning">Add to Stained</button>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Shirts</td>
                            <td>30</td>
                            <td>1</td>
                            <td>300</td>
                            <td>300</td>
                            <td class="text-success">Good</td>
                            <td><button class="btn btn-sm btn-primary">Add to Broken</button>
                                <button class="btn btn-sm btn-warning">Add to Stained</button>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"> <span style="float: right">Total:</span></td>
                            <td>
                                4
                            </td>
                            <td class="">
                                1200
                            </td>
                            <td class="">
                                1200
                            </td>
                            <td colspan="2"></td>
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
