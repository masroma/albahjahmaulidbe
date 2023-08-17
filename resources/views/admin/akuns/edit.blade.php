@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.akun.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.akuns.update", [$akun->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="akun_kode">{{ trans('cruds.akun.fields.akun_kode') }}</label>
                <input class="form-control {{ $errors->has('akun_kode') ? 'is-invalid' : '' }}" type="text" name="akun_kode" id="akun_kode" value="{{ old('akun_kode', $akun->akun_kode) }}" required>
                @if($errors->has('akun_kode'))
                    <span class="text-danger">{{ $errors->first('akun_kode') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.akun.fields.akun_kode_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="akun_nama">{{ trans('cruds.akun.fields.akun_nama') }}</label>
                <input class="form-control {{ $errors->has('akun_nama') ? 'is-invalid' : '' }}" type="text" name="akun_nama" id="akun_nama" value="{{ old('akun_nama', $akun->akun_nama) }}" required>
                @if($errors->has('akun_nama'))
                    <span class="text-danger">{{ $errors->first('akun_nama') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.akun.fields.akun_nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="akun_parent_id">{{ trans('cruds.akun.fields.akun_parent') }}</label>
                <select class="form-control select2 {{ $errors->has('akun_parent') ? 'is-invalid' : '' }}" name="akun_parent_id" id="akun_parent_id" required>
                    @foreach($akun_parents as $id => $entry)
                        <option value="{{ $id }}" {{ (old('akun_parent_id') ? old('akun_parent_id') : $akun->akun_parent->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('akun_parent'))
                    <span class="text-danger">{{ $errors->first('akun_parent') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.akun.fields.akun_parent_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="akun_jenis_id">{{ trans('cruds.akun.fields.akun_jenis') }}</label>
                <select class="form-control select2 {{ $errors->has('akun_jenis') ? 'is-invalid' : '' }}" name="akun_jenis_id" id="akun_jenis_id" required>
                    @foreach($akun_jenis as $id => $entry)
                        <option value="{{ $id }}" {{ (old('akun_jenis_id') ? old('akun_jenis_id') : $akun->akun_jenis->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('akun_jenis'))
                    <span class="text-danger">{{ $errors->first('akun_jenis') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.akun.fields.akun_jenis_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="akun_klasifikasi_id">{{ trans('cruds.akun.fields.akun_klasifikasi') }}</label>
                <select class="form-control select2 {{ $errors->has('akun_klasifikasi') ? 'is-invalid' : '' }}" name="akun_klasifikasi_id" id="akun_klasifikasi_id" required>
                    @foreach($akun_klasifikasis as $id => $entry)
                        <option value="{{ $id }}" {{ (old('akun_klasifikasi_id') ? old('akun_klasifikasi_id') : $akun->akun_klasifikasi->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('akun_klasifikasi'))
                    <span class="text-danger">{{ $errors->first('akun_klasifikasi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.akun.fields.akun_klasifikasi_helper') }}</span>
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