@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.mataUang.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.mata-uangs.update", [$mataUang->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="kode">{{ trans('cruds.mataUang.fields.kode') }}</label>
                <input class="form-control {{ $errors->has('kode') ? 'is-invalid' : '' }}" type="text" name="kode" id="kode" value="{{ old('kode', $mataUang->kode) }}" required>
                @if($errors->has('kode'))
                    <span class="text-danger">{{ $errors->first('kode') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mataUang.fields.kode_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="mata_uang">{{ trans('cruds.mataUang.fields.mata_uang') }}</label>
                <input class="form-control {{ $errors->has('mata_uang') ? 'is-invalid' : '' }}" type="text" name="mata_uang" id="mata_uang" value="{{ old('mata_uang', $mataUang->mata_uang) }}" required>
                @if($errors->has('mata_uang'))
                    <span class="text-danger">{{ $errors->first('mata_uang') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mataUang.fields.mata_uang_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="simbol">{{ trans('cruds.mataUang.fields.simbol') }}</label>
                <input class="form-control {{ $errors->has('simbol') ? 'is-invalid' : '' }}" type="text" name="simbol" id="simbol" value="{{ old('simbol', $mataUang->simbol) }}" required>
                @if($errors->has('simbol'))
                    <span class="text-danger">{{ $errors->first('simbol') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mataUang.fields.simbol_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kurs">{{ trans('cruds.mataUang.fields.kurs') }}</label>
                <input class="form-control {{ $errors->has('kurs') ? 'is-invalid' : '' }}" type="text" name="kurs" id="kurs" value="{{ old('kurs', $mataUang->kurs) }}">
                @if($errors->has('kurs'))
                    <span class="text-danger">{{ $errors->first('kurs') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mataUang.fields.kurs_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fiskal">{{ trans('cruds.mataUang.fields.fiskal') }}</label>
                <input class="form-control {{ $errors->has('fiskal') ? 'is-invalid' : '' }}" type="text" name="fiskal" id="fiskal" value="{{ old('fiskal', $mataUang->fiskal) }}">
                @if($errors->has('fiskal'))
                    <span class="text-danger">{{ $errors->first('fiskal') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mataUang.fields.fiskal_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.mataUang.fields.rate_type') }}</label>
                <select class="form-control {{ $errors->has('rate_type') ? 'is-invalid' : '' }}" name="rate_type" id="rate_type">
                    <option value disabled {{ old('rate_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\MataUang::RATE_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('rate_type', $mataUang->rate_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('rate_type'))
                    <span class="text-danger">{{ $errors->first('rate_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mataUang.fields.rate_type_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('default') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="default" value="0">
                    <input class="form-check-input" type="checkbox" name="default" id="default" value="1" {{ $mataUang->default || old('default', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="default">{{ trans('cruds.mataUang.fields.default') }}</label>
                </div>
                @if($errors->has('default'))
                    <span class="text-danger">{{ $errors->first('default') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mataUang.fields.default_helper') }}</span>
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