@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.hargaJualItem.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.harga-jual-items.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="item_id">{{ trans('cruds.hargaJualItem.fields.item') }}</label>
                <select class="form-control select2 {{ $errors->has('item') ? 'is-invalid' : '' }}" name="item_id" id="item_id" required>
                    @foreach($items as $id => $entry)
                        <option value="{{ $id }}" {{ old('item_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('item'))
                    <span class="text-danger">{{ $errors->first('item') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hargaJualItem.fields.item_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="level_harga_id">{{ trans('cruds.hargaJualItem.fields.level_harga') }}</label>
                <select class="form-control select2 {{ $errors->has('level_harga') ? 'is-invalid' : '' }}" name="level_harga_id" id="level_harga_id" required>
                    @foreach($level_hargas as $id => $entry)
                        <option value="{{ $id }}" {{ old('level_harga_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('level_harga'))
                    <span class="text-danger">{{ $errors->first('level_harga') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hargaJualItem.fields.level_harga_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="mata_uang_id">{{ trans('cruds.hargaJualItem.fields.mata_uang') }}</label>
                <select class="form-control select2 {{ $errors->has('mata_uang') ? 'is-invalid' : '' }}" name="mata_uang_id" id="mata_uang_id" required>
                    @foreach($mata_uangs as $id => $entry)
                        <option value="{{ $id }}" {{ old('mata_uang_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('mata_uang'))
                    <span class="text-danger">{{ $errors->first('mata_uang') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hargaJualItem.fields.mata_uang_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="harga_satuan_1">{{ trans('cruds.hargaJualItem.fields.harga_satuan_1') }}</label>
                <input class="form-control {{ $errors->has('harga_satuan_1') ? 'is-invalid' : '' }}" type="text" name="harga_satuan_1" id="harga_satuan_1" value="{{ old('harga_satuan_1', '0') }}">
                @if($errors->has('harga_satuan_1'))
                    <span class="text-danger">{{ $errors->first('harga_satuan_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hargaJualItem.fields.harga_satuan_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="diskon_satuan_1">{{ trans('cruds.hargaJualItem.fields.diskon_satuan_1') }}</label>
                <input class="form-control {{ $errors->has('diskon_satuan_1') ? 'is-invalid' : '' }}" type="text" name="diskon_satuan_1" id="diskon_satuan_1" value="{{ old('diskon_satuan_1', '0') }}">
                @if($errors->has('diskon_satuan_1'))
                    <span class="text-danger">{{ $errors->first('diskon_satuan_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hargaJualItem.fields.diskon_satuan_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="harga_satuan_2">{{ trans('cruds.hargaJualItem.fields.harga_satuan_2') }}</label>
                <input class="form-control {{ $errors->has('harga_satuan_2') ? 'is-invalid' : '' }}" type="text" name="harga_satuan_2" id="harga_satuan_2" value="{{ old('harga_satuan_2', '0') }}">
                @if($errors->has('harga_satuan_2'))
                    <span class="text-danger">{{ $errors->first('harga_satuan_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hargaJualItem.fields.harga_satuan_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="diskon_satuan_2">{{ trans('cruds.hargaJualItem.fields.diskon_satuan_2') }}</label>
                <input class="form-control {{ $errors->has('diskon_satuan_2') ? 'is-invalid' : '' }}" type="text" name="diskon_satuan_2" id="diskon_satuan_2" value="{{ old('diskon_satuan_2', '0') }}">
                @if($errors->has('diskon_satuan_2'))
                    <span class="text-danger">{{ $errors->first('diskon_satuan_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hargaJualItem.fields.diskon_satuan_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="harga_satuan_3">{{ trans('cruds.hargaJualItem.fields.harga_satuan_3') }}</label>
                <input class="form-control {{ $errors->has('harga_satuan_3') ? 'is-invalid' : '' }}" type="text" name="harga_satuan_3" id="harga_satuan_3" value="{{ old('harga_satuan_3', '0') }}">
                @if($errors->has('harga_satuan_3'))
                    <span class="text-danger">{{ $errors->first('harga_satuan_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hargaJualItem.fields.harga_satuan_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="diskon_satuan_3">{{ trans('cruds.hargaJualItem.fields.diskon_satuan_3') }}</label>
                <input class="form-control {{ $errors->has('diskon_satuan_3') ? 'is-invalid' : '' }}" type="text" name="diskon_satuan_3" id="diskon_satuan_3" value="{{ old('diskon_satuan_3', '0') }}">
                @if($errors->has('diskon_satuan_3'))
                    <span class="text-danger">{{ $errors->first('diskon_satuan_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hargaJualItem.fields.diskon_satuan_3_helper') }}</span>
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