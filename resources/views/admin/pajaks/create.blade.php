@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.pajak.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pajaks.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="kode">{{ trans('cruds.pajak.fields.kode') }}</label>
                <input class="form-control {{ $errors->has('kode') ? 'is-invalid' : '' }}" type="text" name="kode" id="kode" value="{{ old('kode', '') }}" required>
                @if($errors->has('kode'))
                    <span class="text-danger">{{ $errors->first('kode') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pajak.fields.kode_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama_pajak">{{ trans('cruds.pajak.fields.nama_pajak') }}</label>
                <input class="form-control {{ $errors->has('nama_pajak') ? 'is-invalid' : '' }}" type="text" name="nama_pajak" id="nama_pajak" value="{{ old('nama_pajak', '') }}" required>
                @if($errors->has('nama_pajak'))
                    <span class="text-danger">{{ $errors->first('nama_pajak') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pajak.fields.nama_pajak_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="akun_pembelian_id">{{ trans('cruds.pajak.fields.akun_pembelian') }}</label>
                <select class="form-control select2 {{ $errors->has('akun_pembelian') ? 'is-invalid' : '' }}" name="akun_pembelian_id" id="akun_pembelian_id">
                    @foreach($akun_pembelians as $id => $entry)
                        <option value="{{ $id }}" {{ old('akun_pembelian_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('akun_pembelian'))
                    <span class="text-danger">{{ $errors->first('akun_pembelian') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pajak.fields.akun_pembelian_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="akun_penjualan_id">{{ trans('cruds.pajak.fields.akun_penjualan') }}</label>
                <select class="form-control select2 {{ $errors->has('akun_penjualan') ? 'is-invalid' : '' }}" name="akun_penjualan_id" id="akun_penjualan_id">
                    @foreach($akun_penjualans as $id => $entry)
                        <option value="{{ $id }}" {{ old('akun_penjualan_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('akun_penjualan'))
                    <span class="text-danger">{{ $errors->first('akun_penjualan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pajak.fields.akun_penjualan_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="presentasi_npwp">{{ trans('cruds.pajak.fields.presentasi_npwp') }}</label>
                <input class="form-control {{ $errors->has('presentasi_npwp') ? 'is-invalid' : '' }}" type="text" name="presentasi_npwp" id="presentasi_npwp" value="{{ old('presentasi_npwp', '') }}" required>
                @if($errors->has('presentasi_npwp'))
                    <span class="text-danger">{{ $errors->first('presentasi_npwp') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pajak.fields.presentasi_npwp_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="presentasi_non_npwp">{{ trans('cruds.pajak.fields.presentasi_non_npwp') }}</label>
                <input class="form-control {{ $errors->has('presentasi_non_npwp') ? 'is-invalid' : '' }}" type="text" name="presentasi_non_npwp" id="presentasi_non_npwp" value="{{ old('presentasi_non_npwp', '') }}">
                @if($errors->has('presentasi_non_npwp'))
                    <span class="text-danger">{{ $errors->first('presentasi_non_npwp') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pajak.fields.presentasi_non_npwp_helper') }}</span>
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