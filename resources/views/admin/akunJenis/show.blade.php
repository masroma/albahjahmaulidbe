@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.akunJeni.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.akun-jenis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.akunJeni.fields.id') }}
                        </th>
                        <td>
                            {{ $akunJeni->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.akunJeni.fields.kode') }}
                        </th>
                        <td>
                            {{ $akunJeni->kode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.akunJeni.fields.nama') }}
                        </th>
                        <td>
                            {{ $akunJeni->nama }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.akun-jenis.index') }}">
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
            <a class="nav-link" href="#akun_jenis_akuns" role="tab" data-toggle="tab">
                {{ trans('cruds.akun.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="akun_jenis_akuns">
            @includeIf('admin.akunJenis.relationships.akunJenisAkuns', ['akuns' => $akunJeni->akunJenisAkuns])
        </div>
    </div>
</div>

@endsection