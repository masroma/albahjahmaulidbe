@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.proyek.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.proyeks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.proyek.fields.id') }}
                        </th>
                        <td>
                            {{ $proyek->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proyek.fields.kode') }}
                        </th>
                        <td>
                            {{ $proyek->kode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proyek.fields.nama') }}
                        </th>
                        <td>
                            {{ $proyek->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proyek.fields.pegawai') }}
                        </th>
                        <td>
                            {{ $proyek->pegawai->nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proyek.fields.mitra_bisnis') }}
                        </th>
                        <td>
                            {{ $proyek->mitra_bisnis->kode ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proyek.fields.status') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $proyek->status ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.proyeks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection