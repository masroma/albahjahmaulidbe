@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.mitraBisni.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.mitra-bisnis.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="kode">{{ trans('cruds.mitraBisni.fields.kode') }}</label>
                <input class="form-control {{ $errors->has('kode') ? 'is-invalid' : '' }}" type="text" name="kode" id="kode" value="{{ old('kode', '') }}" required>
                @if($errors->has('kode'))
                    <span class="text-danger">{{ $errors->first('kode') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mitraBisni.fields.kode_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama">{{ trans('cruds.mitraBisni.fields.nama') }}</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama', '') }}" required>
                @if($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mitraBisni.fields.nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="deskripsi">{{ trans('cruds.mitraBisni.fields.deskripsi') }}</label>
                <textarea class="form-control {{ $errors->has('deskripsi') ? 'is-invalid' : '' }}" name="deskripsi" id="deskripsi">{{ old('deskripsi') }}</textarea>
                @if($errors->has('deskripsi'))
                    <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mitraBisni.fields.deskripsi_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('aktif') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="aktif" value="0">
                    <input class="form-check-input" type="checkbox" name="aktif" id="aktif" value="1" {{ old('aktif', 0) == 1 || old('aktif') === null ? 'checked' : '' }}>
                    <label class="form-check-label" for="aktif">{{ trans('cruds.mitraBisni.fields.aktif') }}</label>
                </div>
                @if($errors->has('aktif'))
                    <span class="text-danger">{{ $errors->first('aktif') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mitraBisni.fields.aktif_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('tipe_bisnis_customer') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="tipe_bisnis_customer" value="0">
                    <input class="form-check-input" type="checkbox" name="tipe_bisnis_customer" id="tipe_bisnis_customer" value="1" {{ old('tipe_bisnis_customer', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="tipe_bisnis_customer">{{ trans('cruds.mitraBisni.fields.tipe_bisnis_customer') }}</label>
                </div>
                @if($errors->has('tipe_bisnis_customer'))
                    <span class="text-danger">{{ $errors->first('tipe_bisnis_customer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mitraBisni.fields.tipe_bisnis_customer_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('tipe_bisnis_supplier') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="tipe_bisnis_supplier" value="0">
                    <input class="form-check-input" type="checkbox" name="tipe_bisnis_supplier" id="tipe_bisnis_supplier" value="1" {{ old('tipe_bisnis_supplier', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="tipe_bisnis_supplier">{{ trans('cruds.mitraBisni.fields.tipe_bisnis_supplier') }}</label>
                </div>
                @if($errors->has('tipe_bisnis_supplier'))
                    <span class="text-danger">{{ $errors->first('tipe_bisnis_supplier') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mitraBisni.fields.tipe_bisnis_supplier_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="group_1s">{{ trans('cruds.mitraBisni.fields.group_1') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('group_1s') ? 'is-invalid' : '' }}" name="group_1s[]" id="group_1s" multiple>
                    @foreach($group_1s as $id => $group_1)
                        <option value="{{ $id }}" {{ in_array($id, old('group_1s', [])) ? 'selected' : '' }}>{{ $group_1 }}</option>
                    @endforeach
                </select>
                @if($errors->has('group_1s'))
                    <span class="text-danger">{{ $errors->first('group_1s') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mitraBisni.fields.group_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="group_2s">{{ trans('cruds.mitraBisni.fields.group_2') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('group_2s') ? 'is-invalid' : '' }}" name="group_2s[]" id="group_2s" multiple>
                    @foreach($group_2s as $id => $group_2)
                        <option value="{{ $id }}" {{ in_array($id, old('group_2s', [])) ? 'selected' : '' }}>{{ $group_2 }}</option>
                    @endforeach
                </select>
                @if($errors->has('group_2s'))
                    <span class="text-danger">{{ $errors->first('group_2s') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mitraBisni.fields.group_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="group_3s">{{ trans('cruds.mitraBisni.fields.group_3') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('group_3s') ? 'is-invalid' : '' }}" name="group_3s[]" id="group_3s" multiple>
                    @foreach($group_3s as $id => $group_3)
                        <option value="{{ $id }}" {{ in_array($id, old('group_3s', [])) ? 'selected' : '' }}>{{ $group_3 }}</option>
                    @endforeach
                </select>
                @if($errors->has('group_3s'))
                    <span class="text-danger">{{ $errors->first('group_3s') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mitraBisni.fields.group_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="level_hargas">{{ trans('cruds.mitraBisni.fields.level_harga') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('level_hargas') ? 'is-invalid' : '' }}" name="level_hargas[]" id="level_hargas" multiple>
                    @foreach($level_hargas as $id => $level_harga)
                        <option value="{{ $id }}" {{ in_array($id, old('level_hargas', [])) ? 'selected' : '' }}>{{ $level_harga }}</option>
                    @endforeach
                </select>
                @if($errors->has('level_hargas'))
                    <span class="text-danger">{{ $errors->first('level_hargas') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mitraBisni.fields.level_harga_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sales">{{ trans('cruds.mitraBisni.fields.sales') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('sales') ? 'is-invalid' : '' }}" name="sales[]" id="sales" multiple>
                    @foreach($sales as $id => $sale)
                        <option value="{{ $id }}" {{ in_array($id, old('sales', [])) ? 'selected' : '' }}>{{ $sale }}</option>
                    @endforeach
                </select>
                @if($errors->has('sales'))
                    <span class="text-danger">{{ $errors->first('sales') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mitraBisni.fields.sales_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bank">{{ trans('cruds.mitraBisni.fields.bank') }}</label>
                <input class="form-control {{ $errors->has('bank') ? 'is-invalid' : '' }}" type="text" name="bank" id="bank" value="{{ old('bank', '') }}">
                @if($errors->has('bank'))
                    <span class="text-danger">{{ $errors->first('bank') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mitraBisni.fields.bank_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="no_rekening">{{ trans('cruds.mitraBisni.fields.no_rekening') }}</label>
                <input class="form-control {{ $errors->has('no_rekening') ? 'is-invalid' : '' }}" type="text" name="no_rekening" id="no_rekening" value="{{ old('no_rekening', '') }}">
                @if($errors->has('no_rekening'))
                    <span class="text-danger">{{ $errors->first('no_rekening') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mitraBisni.fields.no_rekening_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="atas_nama">{{ trans('cruds.mitraBisni.fields.atas_nama') }}</label>
                <input class="form-control {{ $errors->has('atas_nama') ? 'is-invalid' : '' }}" type="text" name="atas_nama" id="atas_nama" value="{{ old('atas_nama', '') }}">
                @if($errors->has('atas_nama'))
                    <span class="text-danger">{{ $errors->first('atas_nama') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mitraBisni.fields.atas_nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="npwp">{{ trans('cruds.mitraBisni.fields.npwp') }}</label>
                <input class="form-control {{ $errors->has('npwp') ? 'is-invalid' : '' }}" type="text" name="npwp" id="npwp" value="{{ old('npwp', '') }}">
                @if($errors->has('npwp'))
                    <span class="text-danger">{{ $errors->first('npwp') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mitraBisni.fields.npwp_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pkp">{{ trans('cruds.mitraBisni.fields.pkp') }}</label>
                <input class="form-control {{ $errors->has('pkp') ? 'is-invalid' : '' }}" type="text" name="pkp" id="pkp" value="{{ old('pkp', '') }}">
                @if($errors->has('pkp'))
                    <span class="text-danger">{{ $errors->first('pkp') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mitraBisni.fields.pkp_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tanggal_pkp">{{ trans('cruds.mitraBisni.fields.tanggal_pkp') }}</label>
                <input class="form-control {{ $errors->has('tanggal_pkp') ? 'is-invalid' : '' }}" type="text" name="tanggal_pkp" id="tanggal_pkp" value="{{ old('tanggal_pkp', '') }}">
                @if($errors->has('tanggal_pkp'))
                    <span class="text-danger">{{ $errors->first('tanggal_pkp') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mitraBisni.fields.tanggal_pkp_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="no_nik">{{ trans('cruds.mitraBisni.fields.no_nik') }}</label>
                <input class="form-control {{ $errors->has('no_nik') ? 'is-invalid' : '' }}" type="text" name="no_nik" id="no_nik" value="{{ old('no_nik', '') }}">
                @if($errors->has('no_nik'))
                    <span class="text-danger">{{ $errors->first('no_nik') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mitraBisni.fields.no_nik_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="atas_nama_nik">{{ trans('cruds.mitraBisni.fields.atas_nama_nik') }}</label>
                <input class="form-control {{ $errors->has('atas_nama_nik') ? 'is-invalid' : '' }}" type="text" name="atas_nama_nik" id="atas_nama_nik" value="{{ old('atas_nama_nik', '') }}">
                @if($errors->has('atas_nama_nik'))
                    <span class="text-danger">{{ $errors->first('atas_nama_nik') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mitraBisni.fields.atas_nama_nik_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('pembelian_pajak') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="pembelian_pajak" value="0">
                    <input class="form-check-input" type="checkbox" name="pembelian_pajak" id="pembelian_pajak" value="1" {{ old('pembelian_pajak', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="pembelian_pajak">{{ trans('cruds.mitraBisni.fields.pembelian_pajak') }}</label>
                </div>
                @if($errors->has('pembelian_pajak'))
                    <span class="text-danger">{{ $errors->first('pembelian_pajak') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mitraBisni.fields.pembelian_pajak_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('penjualan_pajak') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="penjualan_pajak" value="0">
                    <input class="form-check-input" type="checkbox" name="penjualan_pajak" id="penjualan_pajak" value="1" {{ old('penjualan_pajak', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="penjualan_pajak">{{ trans('cruds.mitraBisni.fields.penjualan_pajak') }}</label>
                </div>
                @if($errors->has('penjualan_pajak'))
                    <span class="text-danger">{{ $errors->first('penjualan_pajak') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mitraBisni.fields.penjualan_pajak_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="image">{{ trans('cruds.mitraBisni.fields.image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                </div>
                @if($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mitraBisni.fields.image_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.imageDropzone = {
    url: '{{ route('admin.mitra-bisnis.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($mitraBisni) && $mitraBisni->image)
      var file = {!! json_encode($mitraBisni->image) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection