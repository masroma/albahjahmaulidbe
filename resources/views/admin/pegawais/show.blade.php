@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pegawai.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pegawais.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pegawai.fields.id') }}
                        </th>
                        <td>
                            {{ $pegawai->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pegawai.fields.kode') }}
                        </th>
                        <td>
                            {{ $pegawai->kode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pegawai.fields.nama') }}
                        </th>
                        <td>
                            {{ $pegawai->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pegawai.fields.alamat') }}
                        </th>
                        <td>
                            {{ $pegawai->alamat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pegawai.fields.kode_kota') }}
                        </th>
                        <td>
                            {{ $pegawai->kode_kota->nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pegawai.fields.kode_pos') }}
                        </th>
                        <td>
                            {{ $pegawai->kode_pos }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pegawai.fields.telephone') }}
                        </th>
                        <td>
                            {{ $pegawai->telephone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pegawai.fields.handphone') }}
                        </th>
                        <td>
                            {{ $pegawai->handphone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pegawai.fields.email') }}
                        </th>
                        <td>
                            {{ $pegawai->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pegawai.fields.aktif') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $pegawai->aktif ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pegawais.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection