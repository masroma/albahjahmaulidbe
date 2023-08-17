@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.cabang.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cabangs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.cabang.fields.id') }}
                        </th>
                        <td>
                            {{ $cabang->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cabang.fields.kode') }}
                        </th>
                        <td>
                            {{ $cabang->kode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cabang.fields.nama') }}
                        </th>
                        <td>
                            {{ $cabang->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cabang.fields.nama_perusahaan_cabang') }}
                        </th>
                        <td>
                            {{ $cabang->nama_perusahaan_cabang }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cabang.fields.alamat') }}
                        </th>
                        <td>
                            {{ $cabang->alamat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cabang.fields.telephone') }}
                        </th>
                        <td>
                            {{ $cabang->telephone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cabang.fields.fax') }}
                        </th>
                        <td>
                            {{ $cabang->fax }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cabang.fields.npwp') }}
                        </th>
                        <td>
                            {{ $cabang->npwp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cabang.fields.pkp') }}
                        </th>
                        <td>
                            {{ $cabang->pkp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cabang.fields.default_customer') }}
                        </th>
                        <td>
                            {{ $cabang->default_customer->test ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cabang.fields.logo_cabang') }}
                        </th>
                        <td>
                            @if($cabang->logo_cabang)
                                <a href="{{ $cabang->logo_cabang->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $cabang->logo_cabang->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cabangs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection