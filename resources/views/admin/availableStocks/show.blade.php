@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Jacket
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
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td>10</td>
                            <td>2</td>
                            <td>300</td>
                            <td>600</td>
                           
                        </tr>
                        <tr>
                            <td></td>
                            <td>20</td>
                            <td>2</td>
                            <td>200</td>
                            <td>400</td>
                            
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"> <span style="float: right">Total:</span></td>
                            <td>
                                3
                            </td>
                            <td class="">
                                500
                            </td>
                            <td class="">
                                1000
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
