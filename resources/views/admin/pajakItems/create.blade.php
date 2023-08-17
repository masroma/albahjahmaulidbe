@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.pajakItem.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pajak-items.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="item_id">{{ trans('cruds.pajakItem.fields.item') }}</label>
                <select class="form-control select2 {{ $errors->has('item') ? 'is-invalid' : '' }}" name="item_id" id="item_id" required>
                    @foreach($items as $id => $entry)
                        <option value="{{ $id }}" {{ old('item_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('item'))
                    <span class="text-danger">{{ $errors->first('item') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pajakItem.fields.item_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pajak_id">{{ trans('cruds.pajakItem.fields.pajak') }}</label>
                <select class="form-control select2 {{ $errors->has('pajak') ? 'is-invalid' : '' }}" name="pajak_id" id="pajak_id">
                    @foreach($pajaks as $id => $entry)
                        <option value="{{ $id }}" {{ old('pajak_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('pajak'))
                    <span class="text-danger">{{ $errors->first('pajak') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pajakItem.fields.pajak_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.pajakItem.fields.perhitungan') }}</label>
                <select class="form-control {{ $errors->has('perhitungan') ? 'is-invalid' : '' }}" name="perhitungan" id="perhitungan">
                    <option value disabled {{ old('perhitungan', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\PajakItem::PERHITUNGAN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('perhitungan', 'Normal') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('perhitungan'))
                    <span class="text-danger">{{ $errors->first('perhitungan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pajakItem.fields.perhitungan_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.pajakItem.fields.tipe_pajak_item') }}</label>
                <select class="form-control {{ $errors->has('tipe_pajak_item') ? 'is-invalid' : '' }}" name="tipe_pajak_item" id="tipe_pajak_item">
                    <option value disabled {{ old('tipe_pajak_item', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\PajakItem::TIPE_PAJAK_ITEM_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('tipe_pajak_item', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('tipe_pajak_item'))
                    <span class="text-danger">{{ $errors->first('tipe_pajak_item') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pajakItem.fields.tipe_pajak_item_helper') }}</span>
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