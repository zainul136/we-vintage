@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            ZIP BROKEN ITEM
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
                                Date
                            </th>

                            <th>
                                Product
                            </th>
                            <th>
                                Variant
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
                            <td>10/9/2023</td>
                            <td>Shoes</td>
                            <td>10</td>
                            <td class="text-success">Repaired</td>
                            <td><button class="btn btn-sm btn-primary">Add to Available Stock</button>
                            </td>
                        </tr>
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
