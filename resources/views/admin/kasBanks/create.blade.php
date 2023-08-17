@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.kasBank.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.kas-banks.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="kode">{{ trans('cruds.kasBank.fields.kode') }}</label>
                <input class="form-control {{ $errors->has('kode') ? 'is-invalid' : '' }}" type="text" name="kode" id="kode" value="{{ old('kode', '') }}" required>
                @if($errors->has('kode'))
                    <span class="text-danger">{{ $errors->first('kode') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.kasBank.fields.kode_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.kasBank.fields.tipe_kas') }}</label>
                <select class="form-control {{ $errors->has('tipe_kas') ? 'is-invalid' : '' }}" name="tipe_kas" id="tipe_kas">
                    <option value disabled {{ old('tipe_kas', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\KasBank::TIPE_KAS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('tipe_kas', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('tipe_kas'))
                    <span class="text-danger">{{ $errors->first('tipe_kas') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.kasBank.fields.tipe_kas_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.kasBank.fields.akun') }}</label>
                <select class="form-control {{ $errors->has('akun') ? 'is-invalid' : '' }}" name="akun" id="akun" required>
                    <option value disabled {{ old('akun', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\KasBank::AKUN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('akun', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('akun'))
                    <span class="text-danger">{{ $errors->first('akun') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.kasBank.fields.akun_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama">{{ trans('cruds.kasBank.fields.nama') }}</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama', '') }}" required>
                @if($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.kasBank.fields.nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.kasBank.fields.mata_uang') }}</label>
                <select class="form-control {{ $errors->has('mata_uang') ? 'is-invalid' : '' }}" name="mata_uang" id="mata_uang" required>
                    <option value disabled {{ old('mata_uang', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\KasBank::MATA_UANG_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('mata_uang', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('mata_uang'))
                    <span class="text-danger">{{ $errors->first('mata_uang') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.kasBank.fields.mata_uang_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="saldo">{{ trans('cruds.kasBank.fields.saldo') }}</label>
                <input class="form-control {{ $errors->has('saldo') ? 'is-invalid' : '' }}" type="number" name="saldo" id="saldo" value="{{ old('saldo', '') }}" step="1">
                @if($errors->has('saldo'))
                    <span class="text-danger">{{ $errors->first('saldo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.kasBank.fields.saldo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tot_giro_keluar">{{ trans('cruds.kasBank.fields.tot_giro_keluar') }}</label>
                <input class="form-control {{ $errors->has('tot_giro_keluar') ? 'is-invalid' : '' }}" type="number" name="tot_giro_keluar" id="tot_giro_keluar" value="{{ old('tot_giro_keluar', '') }}" step="1" required>
                @if($errors->has('tot_giro_keluar'))
                    <span class="text-danger">{{ $errors->first('tot_giro_keluar') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.kasBank.fields.tot_giro_keluar_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('aktif') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="aktif" value="0">
                    <input class="form-check-input" type="checkbox" name="aktif" id="aktif" value="1" {{ old('aktif', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="aktif">{{ trans('cruds.kasBank.fields.aktif') }}</label>
                </div>
                @if($errors->has('aktif'))
                    <span class="text-danger">{{ $errors->first('aktif') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.kasBank.fields.aktif_helper') }}</span>
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