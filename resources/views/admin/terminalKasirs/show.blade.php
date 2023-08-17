@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.terminalKasir.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.terminal-kasirs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.terminalKasir.fields.id') }}
                        </th>
                        <td>
                            {{ $terminalKasir->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.terminalKasir.fields.kode_pos') }}
                        </th>
                        <td>
                            {{ $terminalKasir->kode_pos }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.terminalKasir.fields.nama') }}
                        </th>
                        <td>
                            {{ $terminalKasir->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.terminalKasir.fields.cabang') }}
                        </th>
                        <td>
                            {{ App\Models\TerminalKasir::CABANG_SELECT[$terminalKasir->cabang] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.terminalKasir.fields.gudang') }}
                        </th>
                        <td>
                            {{ App\Models\TerminalKasir::GUDANG_SELECT[$terminalKasir->gudang] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.terminalKasir.fields.kas_kasir') }}
                        </th>
                        <td>
                            {{ App\Models\TerminalKasir::KAS_KASIR_SELECT[$terminalKasir->kas_kasir] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.terminalKasir.fields.kas_setor') }}
                        </th>
                        <td>
                            {{ App\Models\TerminalKasir::KAS_SETOR_SELECT[$terminalKasir->kas_setor] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.terminalKasir.fields.aktif') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $terminalKasir->aktif ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.terminal-kasirs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection