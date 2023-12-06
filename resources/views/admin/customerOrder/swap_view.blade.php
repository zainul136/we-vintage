@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            View Swaped Order Items
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
                                Swap With Product
                            </th>
                            <th>
                                Swap Product's Variant
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

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td>Shirts</td>
                            <td>20</td>
                            <td>Watch</td>
                            <td>10</td>
                            <td>1</td>
                            <td>200</td>
                            <td>400</td>
                        </tr>

                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5"> <span style="float: right">Total:</span></td>
                            <td>
                                1
                            </td>
                            <td class="">
                                200
                            </td>
                            <td class="">
                                400
                            </td>
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
