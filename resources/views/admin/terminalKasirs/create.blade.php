@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.terminalKasir.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.terminal-kasirs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="kode_pos">{{ trans('cruds.terminalKasir.fields.kode_pos') }}</label>
                <input class="form-control {{ $errors->has('kode_pos') ? 'is-invalid' : '' }}" type="text" name="kode_pos" id="kode_pos" value="{{ old('kode_pos', '') }}" required>
                @if($errors->has('kode_pos'))
                    <span class="text-danger">{{ $errors->first('kode_pos') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.terminalKasir.fields.kode_pos_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama">{{ trans('cruds.terminalKasir.fields.nama') }}</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama', '') }}" required>
                @if($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.terminalKasir.fields.nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.terminalKasir.fields.cabang') }}</label>
                <select class="form-control {{ $errors->has('cabang') ? 'is-invalid' : '' }}" name="cabang" id="cabang">
                    <option value disabled {{ old('cabang', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TerminalKasir::CABANG_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('cabang', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('cabang'))
                    <span class="text-danger">{{ $errors->first('cabang') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.terminalKasir.fields.cabang_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.terminalKasir.fields.gudang') }}</label>
                <select class="form-control {{ $errors->has('gudang') ? 'is-invalid' : '' }}" name="gudang" id="gudang">
                    <option value disabled {{ old('gudang', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TerminalKasir::GUDANG_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('gudang', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('gudang'))
                    <span class="text-danger">{{ $errors->first('gudang') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.terminalKasir.fields.gudang_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.terminalKasir.fields.kas_kasir') }}</label>
                <select class="form-control {{ $errors->has('kas_kasir') ? 'is-invalid' : '' }}" name="kas_kasir" id="kas_kasir">
                    <option value disabled {{ old('kas_kasir', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TerminalKasir::KAS_KASIR_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('kas_kasir', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('kas_kasir'))
                    <span class="text-danger">{{ $errors->first('kas_kasir') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.terminalKasir.fields.kas_kasir_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.terminalKasir.fields.kas_setor') }}</label>
                <select class="form-control {{ $errors->has('kas_setor') ? 'is-invalid' : '' }}" name="kas_setor" id="kas_setor">
                    <option value disabled {{ old('kas_setor', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TerminalKasir::KAS_SETOR_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('kas_setor', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('kas_setor'))
                    <span class="text-danger">{{ $errors->first('kas_setor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.terminalKasir.fields.kas_setor_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('aktif') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="aktif" value="0">
                    <input class="form-check-input" type="checkbox" name="aktif" id="aktif" value="1" {{ old('aktif', 0) == 1 || old('aktif') === null ? 'checked' : '' }}>
                    <label class="form-check-label" for="aktif">{{ trans('cruds.terminalKasir.fields.aktif') }}</label>
                </div>
                @if($errors->has('aktif'))
                    <span class="text-danger">{{ $errors->first('aktif') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.terminalKasir.fields.aktif_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection