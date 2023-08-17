@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.mesinEdc.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.mesin-edcs.update", [$mesinEdc->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="kode_edc">{{ trans('cruds.mesinEdc.fields.kode_edc') }}</label>
                <input class="form-control {{ $errors->has('kode_edc') ? 'is-invalid' : '' }}" type="text" name="kode_edc" id="kode_edc" value="{{ old('kode_edc', $mesinEdc->kode_edc) }}" required>
                @if($errors->has('kode_edc'))
                    <span class="text-danger">{{ $errors->first('kode_edc') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mesinEdc.fields.kode_edc_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama_edc">{{ trans('cruds.mesinEdc.fields.nama_edc') }}</label>
                <input class="form-control {{ $errors->has('nama_edc') ? 'is-invalid' : '' }}" type="text" name="nama_edc" id="nama_edc" value="{{ old('nama_edc', $mesinEdc->nama_edc) }}" required>
                @if($errors->has('nama_edc'))
                    <span class="text-danger">{{ $errors->first('nama_edc') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mesinEdc.fields.nama_edc_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.mesinEdc.fields.bank') }}</label>
                <select class="form-control {{ $errors->has('bank') ? 'is-invalid' : '' }}" name="bank" id="bank">
                    <option value disabled {{ old('bank', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\MesinEdc::BANK_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('bank', $mesinEdc->bank) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('bank'))
                    <span class="text-danger">{{ $errors->first('bank') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mesinEdc.fields.bank_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.mesinEdc.fields.cabang') }}</label>
                <select class="form-control {{ $errors->has('cabang') ? 'is-invalid' : '' }}" name="cabang" id="cabang">
                    <option value disabled {{ old('cabang', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\MesinEdc::CABANG_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('cabang', $mesinEdc->cabang) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('cabang'))
                    <span class="text-danger">{{ $errors->first('cabang') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mesinEdc.fields.cabang_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="keterangan">{{ trans('cruds.mesinEdc.fields.keterangan') }}</label>
                <textarea class="form-control {{ $errors->has('keterangan') ? 'is-invalid' : '' }}" name="keterangan" id="keterangan">{{ old('keterangan', $mesinEdc->keterangan) }}</textarea>
                @if($errors->has('keterangan'))
                    <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mesinEdc.fields.keterangan_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('aktif') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="aktif" value="0">
                    <input class="form-check-input" type="checkbox" name="aktif" id="aktif" value="1" {{ $mesinEdc->aktif || old('aktif', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="aktif">{{ trans('cruds.mesinEdc.fields.aktif') }}</label>
                </div>
                @if($errors->has('aktif'))
                    <span class="text-danger">{{ $errors->first('aktif') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mesinEdc.fields.aktif_helper') }}</span>
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