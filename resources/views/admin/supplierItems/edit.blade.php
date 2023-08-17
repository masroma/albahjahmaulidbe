@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.supplierItem.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.supplier-items.update", [$supplierItem->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="supplier_utamas">{{ trans('cruds.supplierItem.fields.supplier_utama') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('supplier_utamas') ? 'is-invalid' : '' }}" name="supplier_utamas[]" id="supplier_utamas" multiple>
                    @foreach($supplier_utamas as $id => $supplier_utama)
                        <option value="{{ $id }}" {{ (in_array($id, old('supplier_utamas', [])) || $supplierItem->supplier_utamas->contains($id)) ? 'selected' : '' }}>{{ $supplier_utama }}</option>
                    @endforeach
                </select>
                @if($errors->has('supplier_utamas'))
                    <span class="text-danger">{{ $errors->first('supplier_utamas') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supplierItem.fields.supplier_utama_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kode_barang_supplier">{{ trans('cruds.supplierItem.fields.kode_barang_supplier') }}</label>
                <input class="form-control {{ $errors->has('kode_barang_supplier') ? 'is-invalid' : '' }}" type="text" name="kode_barang_supplier" id="kode_barang_supplier" value="{{ old('kode_barang_supplier', $supplierItem->kode_barang_supplier) }}">
                @if($errors->has('kode_barang_supplier'))
                    <span class="text-danger">{{ $errors->first('kode_barang_supplier') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supplierItem.fields.kode_barang_supplier_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lama_pemesanan">{{ trans('cruds.supplierItem.fields.lama_pemesanan') }}</label>
                <input class="form-control {{ $errors->has('lama_pemesanan') ? 'is-invalid' : '' }}" type="text" name="lama_pemesanan" id="lama_pemesanan" value="{{ old('lama_pemesanan', $supplierItem->lama_pemesanan) }}">
                @if($errors->has('lama_pemesanan'))
                    <span class="text-danger">{{ $errors->first('lama_pemesanan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supplierItem.fields.lama_pemesanan_helper') }}</span>
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