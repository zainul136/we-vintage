@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.availableStock.title') }}
        </div>

        <div class="card-body">
            <!-- <p>
                                           Text coming soon...
                                        </p> -->
            <div class="table-responsive">
                <table class=" table datatable table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>
                                {{ trans('cruds.addStock.fields.id') }}
                            </th>
                            <th width="40%">
                                Product
                            </th>
                            <th>
                                Qty
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Jacket</td>
                            <td>10</td>
                            <td>
                                <a href="{{ route('admin.available.view') }}"> <button
                                        class="btn btn-primary btn-sm">View</button></a>
                                <a href="{{ route('admin.stocks.add') }}" class="btn btn-primary btn-sm">Add Stock</a>
                                <a href="{{ route('admin.stocks.remove.create') }}" class="btn btn-primary btn-sm">Remove
                                    Stock</a>
                            </td>
                        </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(document).ready(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);

            // Add your delete button logic here

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 100,
            });

            let table = $('.datatable-AvailableStock:not(.ajaxTable)').DataTable({
                buttons: dtButtons,
                rowCallback: function(row, data, index) {
                    let remainingStock = data['remaining_stock'];
                    let lowQty = data['low_qty'];
                    let bgClass = '';

                    if (remainingStock < lowQty) {
                        bgClass = 'red-bg';
                    } else if (remainingStock <= 1.15 * lowQty) {
                        bgClass = 'yellow-bg';
                    }

                    $(row).addClass(bgClass);
                }
            });

            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
            });
        });
    </script>
@endsection
