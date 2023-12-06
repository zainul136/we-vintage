@extends('layouts.admin')
@section('content')
    @can('user_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-primary" href="{{ route('admin.suppliers.create') }}">
                    Add Supplier
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            Supplier List
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table datatable table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>

                            </th>
                            <th>
                                {{ trans('cruds.user.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.user.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.user.fields.email') }}
                            </th>
                            {{-- <th>
                                {{ trans('cruds.user.fields.email_verified_at') }}
                                Name of Poc
                            </th> --}}
                            <th>
                                {{-- {{ trans('cruds.user.fields.roles') }} --}}
                                Contact
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suppliers as $key => $suppliers)
                            <tr data-entry-id="{{ $suppliers->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $suppliers->id ?? '' }}
                                </td>
                                <td>
                                    {{ $suppliers->name ?? '' }}
                                </td>
                                <td>
                                    {{ $suppliers->email ?? '' }}
                                </td>
                                {{-- <td>
                                    {{ $suppliers->poc ?? '' }}
                                </td> --}}
                                <td>
                                    {{ $suppliers->contact ?? '' }}
                                    {{-- @foreach ($user->roles as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach --}}
                                </td>
                                <td>
                                    @can('user_show')
                                        <a class="btn btn-xs btn-primary"
                                            href="{{ route('admin.suppliers.show', $suppliers->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('user_edit')
                                        <a class="btn btn-xs btn-info"
                                            href="{{ route('admin.suppliers.edit', $suppliers->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('user_delete')
                                        <form action="{{ route('admin.suppliers.destroy', $suppliers->id) }}" method="POST"
                                            onsubmit="return swal('Good job!', 'Date has been Deleted!', 'success');"
                                            style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger"
                                                value="{{ trans('global.delete') }}">
                                        </form>
                                    @endcan

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
