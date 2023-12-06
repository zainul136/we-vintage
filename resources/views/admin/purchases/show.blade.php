@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.purchase.title') }}
        </div>

        <div class="card-body">
            {{-- <p>
            Text coming soon...
        </p> --}}
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-AddStock">
                    <thead>
                        <tr>
                            <th>

                            </th>
                            <th>
                                {{ trans('cruds.addStock.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.addStock.fields.barcode') }}
                            </th>
                            <th>
                                {{ trans('cruds.addStock.fields.quantity') }}
                            </th>
                            <th>
                                {{ trans('cruds.addStock.fields.select_product') }}
                            </th>
                            <th>
                                {{ trans('cruds.addStock.fields.buying_price') }}
                            </th>
                            <th>
                                {{ trans('cruds.addStock.fields.selling_price') }}
                            </th>
                            <th>
                                Date
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($addStocks as $key => $addStock)
                            <tr data-entry-id="{{ $addStock->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $i++ }}
                                </td>
                                <td>
                                    {{ $addStock->barcode ?? '' }}
                                </td>
                                <td>
                                    {{ $addStock->quantity ?? '' }}
                                </td>
                                <td>
                                    {{ $addStock->name ?? '' }}
                                </td>
                                <td>
                                    {{ $addStock->buying_price ?? '' }}
                                </td>
                                <td>
                                    {{ $addStock->selling_price ?? '' }}
                                </td>
                                <td>
                                    {{ $addStock->date ?? '' }}
                                </td>

                            </tr>
                        @endforeach
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
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('add_stock_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.add-stocks.massDestroy') }}",
                    className: 'btn-danger',
                    action: function(e, dt, node, config) {
                        var ids = $.map(dt.rows({
                            selected: true
                        }).nodes(), function(entry) {
                            return $(entry).data('entry-id')
                        });

                        if (ids.length === 0) {
                            alert('{{ trans('global.datatables.zero_selected') }}')

                            return
                        }

                        if (confirm('{{ trans('global.areYouSure') }}')) {
                            $.ajax({
                                    headers: {
                                        'x-csrf-token': _token
                                    },
                                    method: 'POST',
                                    url: config.url,
                                    data: {
                                        ids: ids,
                                        _method: 'DELETE'
                                    }
                                })
                                .done(function() {
                                    location.reload()
                                })
                        }
                    }
                }
                dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 100,
            });
            let table = $('.datatable-AddStock:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
