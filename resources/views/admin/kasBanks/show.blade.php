@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.kasBank.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.kas-banks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.kasBank.fields.id') }}
                        </th>
                        <td>
                            {{ $kasBank->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kasBank.fields.kode') }}
                        </th>
                        <td>
                            {{ $kasBank->kode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kasBank.fields.tipe_kas') }}
                        </th>
                        <td>
                            {{ App\Models\KasBank::TIPE_KAS_SELECT[$kasBank->tipe_kas] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kasBank.fields.akun') }}
                        </th>
                        <td>
                            {{ App\Models\KasBank::AKUN_SELECT[$kasBank->akun] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kasBank.fields.nama') }}
                        </th>
                        <td>
                            {{ $kasBank->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kasBank.fields.mata_uang') }}
                        </th>
                        <td>
                            {{ App\Models\KasBank::MATA_UANG_SELECT[$kasBank->mata_uang] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kasBank.fields.saldo') }}
                        </th>
                        <td>
                            {{ $kasBank->saldo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kasBank.fields.tot_giro_keluar') }}
                        </th>
                        <td>
                            {{ $kasBank->tot_giro_keluar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kasBank.fields.aktif') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $kasBank->aktif ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.kas-banks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection