@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{-- {{ trans('global.show') }} {{ trans('cruds.user.title') }} --}}
            Show Supplier
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.suppliers.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.id') }}
                            </th>
                            <td>
                                {{ $supplier->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.name') }}
                            </th>
                            <td>
                                {{ $supplier->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.email') }}
                            </th>
                            <td>
                                {{ $supplier->email }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{-- {{ trans('cruds.user.fields.email_verified_at') }} --}}
                                Contact
                            </th>
                            <td>
                                {{ $supplier->contact }}
                            </td>
                        </tr>
                        {{-- <tr>
                            <th>
                                Company
                                {{ trans('cruds.user.fields.roles') }}
                            </th>
                            <td>
                                {{ $supplier->company }}
                            </td> --}}
                            {{-- <td>
                            @foreach ($user->roles as $key => $roles)
                                <span class="label label-info">{{ $roles->title }}</span>
                            @endforeach
                        </td> --}}
                        {{-- </tr> --}}
                        {{-- <tr>
                            <th>
                                Name of POC
                                {{ trans('cruds.user.fields.roles') }}
                            </th>
                            <td>
                                {{ $supplier->poc }}
                            </td> --}}
                            {{-- <td>
                            @foreach ($user->roles as $key => $roles)
                                <span class="label label-info">{{ $roles->title }}</span>
                            @endforeach
                        </td> --}}
                        {{-- </tr> --}}
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.suppliers.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
