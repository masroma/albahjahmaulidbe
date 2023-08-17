@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.itemGroupOne.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.item-group-ones.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="kode">{{ trans('cruds.itemGroupOne.fields.kode') }}</label>
                <input class="form-control {{ $errors->has('kode') ? 'is-invalid' : '' }}" type="text" name="kode" id="kode" value="{{ old('kode', '') }}" required>
                @if($errors->has('kode'))
                    <span class="text-danger">{{ $errors->first('kode') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.itemGroupOne.fields.kode_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama">{{ trans('cruds.itemGroupOne.fields.nama') }}</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama', '') }}" required>
                @if($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.itemGroupOne.fields.nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.itemGroupOne.fields.item_type') }}</label>
                <select class="form-control {{ $errors->has('item_type') ? 'is-invalid' : '' }}" name="item_type" id="item_type" required>
                    <option value disabled {{ old('item_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\ItemGroupOne::ITEM_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('item_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('item_type'))
                    <span class="text-danger">{{ $errors->first('item_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.itemGroupOne.fields.item_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.itemGroupOne.fields.akun_pembelian') }}</label>
                <select class="form-control {{ $errors->has('akun_pembelian') ? 'is-invalid' : '' }}" name="akun_pembelian" id="akun_pembelian">
                    <option value disabled {{ old('akun_pembelian', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\ItemGroupOne::AKUN_PEMBELIAN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('akun_pembelian', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('akun_pembelian'))
                    <span class="text-danger">{{ $errors->first('akun_pembelian') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.itemGroupOne.fields.akun_pembelian_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.itemGroupOne.fields.akun_hpp') }}</label>
                <select class="form-control {{ $errors->has('akun_hpp') ? 'is-invalid' : '' }}" name="akun_hpp" id="akun_hpp">
                    <option value disabled {{ old('akun_hpp', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\ItemGroupOne::AKUN_HPP_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('akun_hpp', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('akun_hpp'))
                    <span class="text-danger">{{ $errors->first('akun_hpp') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.itemGroupOne.fields.akun_hpp_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.itemGroupOne.fields.akun_penjualan') }}</label>
                <select class="form-control {{ $errors->has('akun_penjualan') ? 'is-invalid' : '' }}" name="akun_penjualan" id="akun_penjualan">
                    <option value disabled {{ old('akun_penjualan', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\ItemGroupOne::AKUN_PENJUALAN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('akun_penjualan', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('akun_penjualan'))
                    <span class="text-danger">{{ $errors->first('akun_penjualan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.itemGroupOne.fields.akun_penjualan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="akun_retur_penjualan">{{ trans('cruds.itemGroupOne.fields.akun_retur_penjualan') }}</label>
                <input class="form-control {{ $errors->has('akun_retur_penjualan') ? 'is-invalid' : '' }}" type="text" name="akun_retur_penjualan" id="akun_retur_penjualan" value="{{ old('akun_retur_penjualan', '') }}">
                @if($errors->has('akun_retur_penjualan'))
                    <span class="text-danger">{{ $errors->first('akun_retur_penjualan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.itemGroupOne.fields.akun_retur_penjualan_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('tampil_pos') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="tampil_pos" value="0">
                    <input class="form-check-input" type="checkbox" name="tampil_pos" id="tampil_pos" value="1" {{ old('tampil_pos', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="tampil_pos">{{ trans('cruds.itemGroupOne.fields.tampil_pos') }}</label>
                </div>
                @if($errors->has('tampil_pos'))
                    <span class="text-danger">{{ $errors->first('tampil_pos') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.itemGroupOne.fields.tampil_pos_helper') }}</span>
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