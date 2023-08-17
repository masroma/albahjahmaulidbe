@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.periodeRekuring.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.periode-rekurings.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="kode">{{ trans('cruds.periodeRekuring.fields.kode') }}</label>
                <input class="form-control {{ $errors->has('kode') ? 'is-invalid' : '' }}" type="text" name="kode" id="kode" value="{{ old('kode', '') }}" required>
                @if($errors->has('kode'))
                    <span class="text-danger">{{ $errors->first('kode') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.periodeRekuring.fields.kode_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="keterangan">{{ trans('cruds.periodeRekuring.fields.keterangan') }}</label>
                <input class="form-control {{ $errors->has('keterangan') ? 'is-invalid' : '' }}" type="text" name="keterangan" id="keterangan" value="{{ old('keterangan', '') }}" required>
                @if($errors->has('keterangan'))
                    <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.periodeRekuring.fields.keterangan_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.periodeRekuring.fields.faktor_pengali') }}</label>
                <select class="form-control {{ $errors->has('faktor_pengali') ? 'is-invalid' : '' }}" name="faktor_pengali" id="faktor_pengali" required>
                    <option value disabled {{ old('faktor_pengali', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\PeriodeRekuring::FAKTOR_PENGALI_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('faktor_pengali', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('faktor_pengali'))
                    <span class="text-danger">{{ $errors->first('faktor_pengali') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.periodeRekuring.fields.faktor_pengali_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nilai_pengali">{{ trans('cruds.periodeRekuring.fields.nilai_pengali') }}</label>
                <input class="form-control {{ $errors->has('nilai_pengali') ? 'is-invalid' : '' }}" type="number" name="nilai_pengali" id="nilai_pengali" value="{{ old('nilai_pengali', '') }}" step="1" required>
                @if($errors->has('nilai_pengali'))
                    <span class="text-danger">{{ $errors->first('nilai_pengali') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.periodeRekuring.fields.nilai_pengali_helper') }}</span>
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