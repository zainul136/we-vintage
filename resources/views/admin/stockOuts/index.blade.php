@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-5 text-left">
                    Stock
                </div>
                <div class="col-7 text-right">
                    <form>
                        <div class="row">
                            <div class="form-group col-5">
                                <div class="row">
                                    <div class="col-2"><label class="pt-2">From</label></div>
                                    <div class="col-10"><input type="date" value="{{ $from ?? '' }}" name="from"
                                            class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-5">
                                <div class="row p-0">
                                    <div class="col-2"><label class="pt-2">To</label></div>
                                    <div class="col-10"><input type="date" value="{{ $to ?? '' }}" name="to"
                                            class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-2">
                                <div class="row">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card-body">
            {{-- <p>
            Text coming soon...
        </p> --}}
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-RemoveStock">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                Date
                            </th>
                            <th>
                                Product
                            </th>
                            <th>
                                Barcode
                            </th>
                            <th>
                                Buying Price
                            </th>
                            <th>
                                Selling Price
                            </th>
                            <th>
                                Quantity
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $id = 1;
                        @endphp
                        @foreach ($removeStocks as $key => $removeStock)
                            <tr data-entry-id="{{ $removeStock->stock_log_id }}">
                                <td>
                                </td>
                                <td>
                                    {{ $removeStock->date ?? '' }}
                                </td>
                                <td>
                                    {{ $removeStock->name ?? '' }}
                                </td>
                                <td>
                                    {{ $removeStock->barcode ?? '' }}
                                </td>
                                <td>
                                    {{ $removeStock->buying_price ?? '' }}
                                </td>
                                <td>
                                    {{ $removeStock->selling_price ?? '' }}
                                </td>
                                <td>
                                    {{ $removeStock->quantity ?? '' }}
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
            // @can('remove_stock_delete')
            //     let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            //     let deleteButton = {
            //         text: deleteButtonTrans,
            //         url: "{{ route('admin.stock-outs.massDestroy') }}",
            //         className: 'btn-danger',
            //         action: function(e, dt, node, config) {
            //             var ids = $.map(dt.rows({
            //                 selected: true
            //             }).nodes(), function(entry) {
            //                 return $(entry).data('entry-id')
            //             });

            //             if (ids.length === 0) {
            //                 alert('{{ trans('global.datatables.zero_selected') }}')

            //                 return
            //             }

            //             if (confirm('{{ trans('global.areYouSure') }}')) {
            //                 $.ajax({
            //                         headers: {
            //                             'x-csrf-token': _token
            //                         },
            //                         method: 'POST',
            //                         url: config.url,
            //                         data: {
            //                             ids: ids,
            //                             _method: 'DELETE'
            //                         }
            //                     })
            //                     .done(function(e) {
            //                         console.log(e);
            //                         // location.reload()
            //                     })
            //             }
            //         }
            //     }
            //     dtButtons.push(deleteButton)
            // @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 100,
            });
            let table = $('.datatable-RemoveStock:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
