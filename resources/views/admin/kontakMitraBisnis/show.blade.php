@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.kontakMitraBisni.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.kontak-mitra-bisnis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.kontakMitraBisni.fields.id') }}
                        </th>
                        <td>
                            {{ $kontakMitraBisni->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kontakMitraBisni.fields.mitra_bisnis') }}
                        </th>
                        <td>
                            @foreach($kontakMitraBisni->mitra_bisnis as $key => $mitra_bisnis)
                                <span class="label label-info">{{ $mitra_bisnis->nama }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kontakMitraBisni.fields.nama_kontak') }}
                        </th>
                        <td>
                            {{ $kontakMitraBisni->nama_kontak }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kontakMitraBisni.fields.jabatan') }}
                        </th>
                        <td>
                            {{ $kontakMitraBisni->jabatan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kontakMitraBisni.fields.handphone') }}
                        </th>
                        <td>
                            {{ $kontakMitraBisni->handphone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kontakMitraBisni.fields.email') }}
                        </th>
                        <td>
                            {{ $kontakMitraBisni->email }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.kontak-mitra-bisnis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection