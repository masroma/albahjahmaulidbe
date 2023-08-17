@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.proyek.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.proyeks.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="kode">{{ trans('cruds.proyek.fields.kode') }}</label>
                <input class="form-control {{ $errors->has('kode') ? 'is-invalid' : '' }}" type="text" name="kode" id="kode" value="{{ old('kode', '') }}" required>
                @if($errors->has('kode'))
                    <span class="text-danger">{{ $errors->first('kode') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.proyek.fields.kode_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama">{{ trans('cruds.proyek.fields.nama') }}</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama', '') }}" required>
                @if($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.proyek.fields.nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pegawai_id">{{ trans('cruds.proyek.fields.pegawai') }}</label>
                <select class="form-control select2 {{ $errors->has('pegawai') ? 'is-invalid' : '' }}" name="pegawai_id" id="pegawai_id">
                    @foreach($pegawais as $id => $entry)
                        <option value="{{ $id }}" {{ old('pegawai_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('pegawai'))
                    <span class="text-danger">{{ $errors->first('pegawai') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.proyek.fields.pegawai_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mitra_bisnis_id">{{ trans('cruds.proyek.fields.mitra_bisnis') }}</label>
                <select class="form-control select2 {{ $errors->has('mitra_bisnis') ? 'is-invalid' : '' }}" name="mitra_bisnis_id" id="mitra_bisnis_id">
                    @foreach($mitra_bisnis as $id => $entry)
                        <option value="{{ $id }}" {{ old('mitra_bisnis_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('mitra_bisnis'))
                    <span class="text-danger">{{ $errors->first('mitra_bisnis') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.proyek.fields.mitra_bisnis_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('status') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="status" value="0">
                    <input class="form-check-input" type="checkbox" name="status" id="status" value="1" {{ old('status', 0) == 1 || old('status') === null ? 'checked' : '' }}>
                    <label class="form-check-label" for="status">{{ trans('cruds.proyek.fields.status') }}</label>
                </div>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.proyek.fields.status_helper') }}</span>
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