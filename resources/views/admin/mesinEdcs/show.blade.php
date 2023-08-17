@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.mesinEdc.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mesin-edcs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.mesinEdc.fields.id') }}
                        </th>
                        <td>
                            {{ $mesinEdc->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mesinEdc.fields.kode_edc') }}
                        </th>
                        <td>
                            {{ $mesinEdc->kode_edc }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mesinEdc.fields.nama_edc') }}
                        </th>
                        <td>
                            {{ $mesinEdc->nama_edc }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mesinEdc.fields.bank') }}
                        </th>
                        <td>
                            {{ App\Models\MesinEdc::BANK_SELECT[$mesinEdc->bank] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mesinEdc.fields.cabang') }}
                        </th>
                        <td>
                            {{ App\Models\MesinEdc::CABANG_SELECT[$mesinEdc->cabang] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mesinEdc.fields.keterangan') }}
                        </th>
                        <td>
                            {{ $mesinEdc->keterangan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mesinEdc.fields.aktif') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $mesinEdc->aktif ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mesin-edcs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection