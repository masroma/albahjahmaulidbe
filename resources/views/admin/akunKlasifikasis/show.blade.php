@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.akunKlasifikasi.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.akun-klasifikasis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.akunKlasifikasi.fields.id') }}
                        </th>
                        <td>
                            {{ $akunKlasifikasi->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.akunKlasifikasi.fields.kode') }}
                        </th>
                        <td>
                            {{ $akunKlasifikasi->kode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.akunKlasifikasi.fields.nama') }}
                        </th>
                        <td>
                            {{ $akunKlasifikasi->nama }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.akun-klasifikasis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#akun_klasifikasi_akuns" role="tab" data-toggle="tab">
                {{ trans('cruds.akun.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="akun_klasifikasi_akuns">
            @includeIf('admin.akunKlasifikasis.relationships.akunKlasifikasiAkuns', ['akuns' => $akunKlasifikasi->akunKlasifikasiAkuns])
        </div>
    </div>
</div>

@endsection