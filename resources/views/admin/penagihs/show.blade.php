@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.penagih.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.penagihs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.penagih.fields.id') }}
                        </th>
                        <td>
                            {{ $penagih->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penagih.fields.kode') }}
                        </th>
                        <td>
                            {{ $penagih->kode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penagih.fields.nama_penagih') }}
                        </th>
                        <td>
                            {{ $penagih->nama_penagih }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penagih.fields.alamat') }}
                        </th>
                        <td>
                            {{ $penagih->alamat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penagih.fields.kode_kota') }}
                        </th>
                        <td>
                            {{ $penagih->kode_kota->nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penagih.fields.kode_pos') }}
                        </th>
                        <td>
                            {{ $penagih->kode_pos }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penagih.fields.telephone') }}
                        </th>
                        <td>
                            {{ $penagih->telephone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penagih.fields.handphone') }}
                        </th>
                        <td>
                            {{ $penagih->handphone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penagih.fields.email') }}
                        </th>
                        <td>
                            {{ $penagih->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penagih.fields.aktif') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $penagih->aktif ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.penagihs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection