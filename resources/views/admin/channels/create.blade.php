@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.channel.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.channels.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="kode">{{ trans('cruds.channel.fields.kode') }}</label>
                <input class="form-control {{ $errors->has('kode') ? 'is-invalid' : '' }}" type="text" name="kode" id="kode" value="{{ old('kode', '') }}" required>
                @if($errors->has('kode'))
                    <span class="text-danger">{{ $errors->first('kode') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.channel.fields.kode_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama">{{ trans('cruds.channel.fields.nama') }}</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama', '') }}" required>
                @if($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.channel.fields.nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="warna">{{ trans('cruds.channel.fields.warna') }}</label>
                <input class="form-control {{ $errors->has('warna') ? 'is-invalid' : '' }}" type="text" name="warna" id="warna" value="{{ old('warna', '') }}">
                @if($errors->has('warna'))
                    <span class="text-danger">{{ $errors->first('warna') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.channel.fields.warna_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('aktif') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="aktif" value="0">
                    <input class="form-check-input" type="checkbox" name="aktif" id="aktif" value="1" {{ old('aktif', 0) == 1 || old('aktif') === null ? 'checked' : '' }}>
                    <label class="form-check-label" for="aktif">{{ trans('cruds.channel.fields.aktif') }}</label>
                </div>
                @if($errors->has('aktif'))
                    <span class="text-danger">{{ $errors->first('aktif') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.channel.fields.aktif_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('tampil_di_pos') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="tampil_di_pos" value="0">
                    <input class="form-check-input" type="checkbox" name="tampil_di_pos" id="tampil_di_pos" value="1" {{ old('tampil_di_pos', 0) == 1 || old('tampil_di_pos') === null ? 'checked' : '' }}>
                    <label class="form-check-label" for="tampil_di_pos">{{ trans('cruds.channel.fields.tampil_di_pos') }}</label>
                </div>
                @if($errors->has('tampil_di_pos'))
                    <span class="text-danger">{{ $errors->first('tampil_di_pos') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.channel.fields.tampil_di_pos_helper') }}</span>
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