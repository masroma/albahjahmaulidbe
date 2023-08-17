@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.periodeRekuring.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.periode-rekurings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.periodeRekuring.fields.id') }}
                        </th>
                        <td>
                            {{ $periodeRekuring->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.periodeRekuring.fields.kode') }}
                        </th>
                        <td>
                            {{ $periodeRekuring->kode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.periodeRekuring.fields.keterangan') }}
                        </th>
                        <td>
                            {{ $periodeRekuring->keterangan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.periodeRekuring.fields.faktor_pengali') }}
                        </th>
                        <td>
                            {{ App\Models\PeriodeRekuring::FAKTOR_PENGALI_SELECT[$periodeRekuring->faktor_pengali] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.periodeRekuring.fields.nilai_pengali') }}
                        </th>
                        <td>
                            {{ $periodeRekuring->nilai_pengali }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.periode-rekurings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection