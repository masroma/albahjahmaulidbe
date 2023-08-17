@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.alamatMitraBisni.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.alamat-mitra-bisnis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.alamatMitraBisni.fields.id') }}
                        </th>
                        <td>
                            {{ $alamatMitraBisni->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alamatMitraBisni.fields.mitra_bisnis') }}
                        </th>
                        <td>
                            @foreach($alamatMitraBisni->mitra_bisnis as $key => $mitra_bisnis)
                                <span class="label label-info">{{ $mitra_bisnis->nama }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alamatMitraBisni.fields.keterangan_alamat') }}
                        </th>
                        <td>
                            {{ $alamatMitraBisni->keterangan_alamat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alamatMitraBisni.fields.alamat_lengkap') }}
                        </th>
                        <td>
                            {{ $alamatMitraBisni->alamat_lengkap }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alamatMitraBisni.fields.kota') }}
                        </th>
                        <td>
                            @foreach($alamatMitraBisni->kotas as $key => $kota)
                                <span class="label label-info">{{ $kota->nama }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alamatMitraBisni.fields.telepon') }}
                        </th>
                        <td>
                            {{ $alamatMitraBisni->telepon }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alamatMitraBisni.fields.fax') }}
                        </th>
                        <td>
                            {{ $alamatMitraBisni->fax }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alamatMitraBisni.fields.kode_pos') }}
                        </th>
                        <td>
                            {{ $alamatMitraBisni->kode_pos }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.alamat-mitra-bisnis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection