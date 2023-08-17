@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.sale.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sales.update", [$sale->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="kode">{{ trans('cruds.sale.fields.kode') }}</label>
                <input class="form-control {{ $errors->has('kode') ? 'is-invalid' : '' }}" type="text" name="kode" id="kode" value="{{ old('kode', $sale->kode) }}" required>
                @if($errors->has('kode'))
                    <span class="text-danger">{{ $errors->first('kode') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.sale.fields.kode_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama">{{ trans('cruds.sale.fields.nama') }}</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama', $sale->nama) }}" required>
                @if($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.sale.fields.nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="alamat">{{ trans('cruds.sale.fields.alamat') }}</label>
                <input class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" type="text" name="alamat" id="alamat" value="{{ old('alamat', $sale->alamat) }}" required>
                @if($errors->has('alamat'))
                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.sale.fields.alamat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kode_kota_id">{{ trans('cruds.sale.fields.kode_kota') }}</label>
                <select class="form-control select2 {{ $errors->has('kode_kota') ? 'is-invalid' : '' }}" name="kode_kota_id" id="kode_kota_id">
                    @foreach($kode_kotas as $id => $entry)
                        <option value="{{ $id }}" {{ (old('kode_kota_id') ? old('kode_kota_id') : $sale->kode_kota->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('kode_kota'))
                    <span class="text-danger">{{ $errors->first('kode_kota') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.sale.fields.kode_kota_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kode_pos">{{ trans('cruds.sale.fields.kode_pos') }}</label>
                <input class="form-control {{ $errors->has('kode_pos') ? 'is-invalid' : '' }}" type="text" name="kode_pos" id="kode_pos" value="{{ old('kode_pos', $sale->kode_pos) }}">
                @if($errors->has('kode_pos'))
                    <span class="text-danger">{{ $errors->first('kode_pos') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.sale.fields.kode_pos_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telephone">{{ trans('cruds.sale.fields.telephone') }}</label>
                <input class="form-control {{ $errors->has('telephone') ? 'is-invalid' : '' }}" type="text" name="telephone" id="telephone" value="{{ old('telephone', $sale->telephone) }}">
                @if($errors->has('telephone'))
                    <span class="text-danger">{{ $errors->first('telephone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.sale.fields.telephone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="handphone">{{ trans('cruds.sale.fields.handphone') }}</label>
                <input class="form-control {{ $errors->has('handphone') ? 'is-invalid' : '' }}" type="text" name="handphone" id="handphone" value="{{ old('handphone', $sale->handphone) }}" required>
                @if($errors->has('handphone'))
                    <span class="text-danger">{{ $errors->first('handphone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.sale.fields.handphone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.sale.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $sale->email) }}">
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.sale.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('aktif') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="aktif" value="0">
                    <input class="form-check-input" type="checkbox" name="aktif" id="aktif" value="1" {{ $sale->aktif || old('aktif', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="aktif">{{ trans('cruds.sale.fields.aktif') }}</label>
                </div>
                @if($errors->has('aktif'))
                    <span class="text-danger">{{ $errors->first('aktif') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.sale.fields.aktif_helper') }}</span>
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