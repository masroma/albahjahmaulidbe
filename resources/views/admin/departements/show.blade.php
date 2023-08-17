@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.departement.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.departements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.departement.fields.id') }}
                        </th>
                        <td>
                            {{ $departement->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.departement.fields.code') }}
                        </th>
                        <td>
                            {{ $departement->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.departement.fields.nama') }}
                        </th>
                        <td>
                            {{ $departement->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.departement.fields.keterangan') }}
                        </th>
                        <td>
                            {{ $departement->keterangan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.departement.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $departement->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.departements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection