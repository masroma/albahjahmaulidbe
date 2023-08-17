@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.alamatMitraBisni.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.alamat-mitra-bisnis.update", [$alamatMitraBisni->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="mitra_bisnis">{{ trans('cruds.alamatMitraBisni.fields.mitra_bisnis') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('mitra_bisnis') ? 'is-invalid' : '' }}" name="mitra_bisnis[]" id="mitra_bisnis" multiple>
                    @foreach($mitra_bisnis as $id => $mitra_bisni)
                        <option value="{{ $id }}" {{ (in_array($id, old('mitra_bisnis', [])) || $alamatMitraBisni->mitra_bisnis->contains($id)) ? 'selected' : '' }}>{{ $mitra_bisni }}</option>
                    @endforeach
                </select>
                @if($errors->has('mitra_bisnis'))
                    <span class="text-danger">{{ $errors->first('mitra_bisnis') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.alamatMitraBisni.fields.mitra_bisnis_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="keterangan_alamat">{{ trans('cruds.alamatMitraBisni.fields.keterangan_alamat') }}</label>
                <input class="form-control {{ $errors->has('keterangan_alamat') ? 'is-invalid' : '' }}" type="text" name="keterangan_alamat" id="keterangan_alamat" value="{{ old('keterangan_alamat', $alamatMitraBisni->keterangan_alamat) }}">
                @if($errors->has('keterangan_alamat'))
                    <span class="text-danger">{{ $errors->first('keterangan_alamat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.alamatMitraBisni.fields.keterangan_alamat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alamat_lengkap">{{ trans('cruds.alamatMitraBisni.fields.alamat_lengkap') }}</label>
                <textarea class="form-control {{ $errors->has('alamat_lengkap') ? 'is-invalid' : '' }}" name="alamat_lengkap" id="alamat_lengkap">{{ old('alamat_lengkap', $alamatMitraBisni->alamat_lengkap) }}</textarea>
                @if($errors->has('alamat_lengkap'))
                    <span class="text-danger">{{ $errors->first('alamat_lengkap') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.alamatMitraBisni.fields.alamat_lengkap_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kotas">{{ trans('cruds.alamatMitraBisni.fields.kota') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('kotas') ? 'is-invalid' : '' }}" name="kotas[]" id="kotas" multiple>
                    @foreach($kotas as $id => $kota)
                        <option value="{{ $id }}" {{ (in_array($id, old('kotas', [])) || $alamatMitraBisni->kotas->contains($id)) ? 'selected' : '' }}>{{ $kota }}</option>
                    @endforeach
                </select>
                @if($errors->has('kotas'))
                    <span class="text-danger">{{ $errors->first('kotas') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.alamatMitraBisni.fields.kota_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telepon">{{ trans('cruds.alamatMitraBisni.fields.telepon') }}</label>
                <input class="form-control {{ $errors->has('telepon') ? 'is-invalid' : '' }}" type="text" name="telepon" id="telepon" value="{{ old('telepon', $alamatMitraBisni->telepon) }}">
                @if($errors->has('telepon'))
                    <span class="text-danger">{{ $errors->first('telepon') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.alamatMitraBisni.fields.telepon_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fax">{{ trans('cruds.alamatMitraBisni.fields.fax') }}</label>
                <input class="form-control {{ $errors->has('fax') ? 'is-invalid' : '' }}" type="text" name="fax" id="fax" value="{{ old('fax', $alamatMitraBisni->fax) }}">
                @if($errors->has('fax'))
                    <span class="text-danger">{{ $errors->first('fax') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.alamatMitraBisni.fields.fax_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kode_pos">{{ trans('cruds.alamatMitraBisni.fields.kode_pos') }}</label>
                <input class="form-control {{ $errors->has('kode_pos') ? 'is-invalid' : '' }}" type="text" name="kode_pos" id="kode_pos" value="{{ old('kode_pos', $alamatMitraBisni->kode_pos) }}">
                @if($errors->has('kode_pos'))
                    <span class="text-danger">{{ $errors->first('kode_pos') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.alamatMitraBisni.fields.kode_pos_helper') }}</span>
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