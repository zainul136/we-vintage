@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{-- <form action="{{ route('admin.purchases.index') }}"> --}}
            <form action="{{ route('admin.purchases.index') }}">
                <div class="row">
                    <div class="col-md-2 text-left mt-2">
                        {{ trans('cruds.purchase.title') }}
                    </div>
                    <div class="col-md-8 ">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="pt-2">Supplier</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="supplier_id" class="form-control" required>
                                            <option value="">Select</option>
                                            @if (count($suppliers) > 0)
                                                @foreach ($suppliers as $supplier)
                                                    <option value="{{ $supplier->id }}"
                                                        {{ $supplier->id == $supplier_id ? 'selected' : '' }}>
                                                        {{ $supplier->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="pt-2">From</label>

                                    </div>
                                    <div class="col-md-9">
                                        <input type="date" name="from" class="form-control"
                                            value="{{ $from ?? '' }}" required>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group col-md-4">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="pt-2">To</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="date" name="to" value="{{ $to ?? '' }}"
                                            class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 form-group">
                        <div class="row" style="float: right;">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-AddStock">
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
                                Supplier
                            </th>
                            <th>
                                Added By
                            </th>
                            <th>
                                Quantity
                            </th>
                            {{-- <th>
                                Status
                            </th> --}}
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
                                    {{ $addStock->date ?? '' }}
                                </td>
                                <td>
                                    {{ $addStock->name ?? '' }}
                                </td>
                                <td>
                                    {{ $addStock->barcode ?? '' }}
                                </td>
                                <td>
                                    {{ $addStock->buying_price ?? '' }}
                                </td>
                                <td>
                                    {{ $addStock->selling_price ?? '' }}
                                </td>
                                <td>
                                    {{ $addStock->supplier_name ?? '' }}
                                </td>
                                <td>
                                    {{ $addStock->user_name ?? '' }}
                                </td>
                                <td>
                                    {{ $addStock->quantity ?? '' }}
                                </td>
                                {{-- <td>
                                    <button type="button" class="btn btn-primary">{{ $addStock->status ?? '' }}</button>
                                </td> --}}
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
