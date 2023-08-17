@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.satuan.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.satuans.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="satuan_1">{{ trans('cruds.satuan.fields.satuan_1') }}</label>
                <input class="form-control {{ $errors->has('satuan_1') ? 'is-invalid' : '' }}" type="text" name="satuan_1" id="satuan_1" value="{{ old('satuan_1', '') }}">
                @if($errors->has('satuan_1'))
                    <span class="text-danger">{{ $errors->first('satuan_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.satuan.fields.satuan_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="satuan_2">{{ trans('cruds.satuan.fields.satuan_2') }}</label>
                <input class="form-control {{ $errors->has('satuan_2') ? 'is-invalid' : '' }}" type="text" name="satuan_2" id="satuan_2" value="{{ old('satuan_2', '') }}">
                @if($errors->has('satuan_2'))
                    <span class="text-danger">{{ $errors->first('satuan_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.satuan.fields.satuan_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="isi_2">{{ trans('cruds.satuan.fields.isi_2') }}</label>
                <input class="form-control {{ $errors->has('isi_2') ? 'is-invalid' : '' }}" type="text" name="isi_2" id="isi_2" value="{{ old('isi_2', '') }}">
                @if($errors->has('isi_2'))
                    <span class="text-danger">{{ $errors->first('isi_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.satuan.fields.isi_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="satuan_3">{{ trans('cruds.satuan.fields.satuan_3') }}</label>
                <input class="form-control {{ $errors->has('satuan_3') ? 'is-invalid' : '' }}" type="text" name="satuan_3" id="satuan_3" value="{{ old('satuan_3', '') }}">
                @if($errors->has('satuan_3'))
                    <span class="text-danger">{{ $errors->first('satuan_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.satuan.fields.satuan_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="isi_3">{{ trans('cruds.satuan.fields.isi_3') }}</label>
                <input class="form-control {{ $errors->has('isi_3') ? 'is-invalid' : '' }}" type="text" name="isi_3" id="isi_3" value="{{ old('isi_3', '') }}">
                @if($errors->has('isi_3'))
                    <span class="text-danger">{{ $errors->first('isi_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.satuan.fields.isi_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="satuan_pembelian">{{ trans('cruds.satuan.fields.satuan_pembelian') }}</label>
                <input class="form-control {{ $errors->has('satuan_pembelian') ? 'is-invalid' : '' }}" type="text" name="satuan_pembelian" id="satuan_pembelian" value="{{ old('satuan_pembelian', '') }}">
                @if($errors->has('satuan_pembelian'))
                    <span class="text-danger">{{ $errors->first('satuan_pembelian') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.satuan.fields.satuan_pembelian_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="satuan_penjualan">{{ trans('cruds.satuan.fields.satuan_penjualan') }}</label>
                <input class="form-control {{ $errors->has('satuan_penjualan') ? 'is-invalid' : '' }}" type="text" name="satuan_penjualan" id="satuan_penjualan" value="{{ old('satuan_penjualan', '') }}">
                @if($errors->has('satuan_penjualan'))
                    <span class="text-danger">{{ $errors->first('satuan_penjualan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.satuan.fields.satuan_penjualan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="satuan_stok">{{ trans('cruds.satuan.fields.satuan_stok') }}</label>
                <input class="form-control {{ $errors->has('satuan_stok') ? 'is-invalid' : '' }}" type="text" name="satuan_stok" id="satuan_stok" value="{{ old('satuan_stok', '') }}">
                @if($errors->has('satuan_stok'))
                    <span class="text-danger">{{ $errors->first('satuan_stok') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.satuan.fields.satuan_stok_helper') }}</span>
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