@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.item.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.items.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="item_kode">{{ trans('cruds.item.fields.item_kode') }}</label>
                <input class="form-control {{ $errors->has('item_kode') ? 'is-invalid' : '' }}" type="text" name="item_kode" id="item_kode" value="{{ old('item_kode', '') }}" required>
                @if($errors->has('item_kode'))
                    <span class="text-danger">{{ $errors->first('item_kode') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.item.fields.item_kode_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="item_nama">{{ trans('cruds.item.fields.item_nama') }}</label>
                <input class="form-control {{ $errors->has('item_nama') ? 'is-invalid' : '' }}" type="text" name="item_nama" id="item_nama" value="{{ old('item_nama', '') }}" required>
                @if($errors->has('item_nama'))
                    <span class="text-danger">{{ $errors->first('item_nama') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.item.fields.item_nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="barcode">{{ trans('cruds.item.fields.barcode') }}</label>
                <input class="form-control {{ $errors->has('barcode') ? 'is-invalid' : '' }}" type="text" name="barcode" id="barcode" value="{{ old('barcode', '') }}">
                @if($errors->has('barcode'))
                    <span class="text-danger">{{ $errors->first('barcode') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.item.fields.barcode_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="item_merk_id">{{ trans('cruds.item.fields.item_merk') }}</label>
                <select class="form-control select2 {{ $errors->has('item_merk') ? 'is-invalid' : '' }}" name="item_merk_id" id="item_merk_id">
                    @foreach($item_merks as $id => $entry)
                        <option value="{{ $id }}" {{ old('item_merk_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('item_merk'))
                    <span class="text-danger">{{ $errors->first('item_merk') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.item.fields.item_merk_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="item_group_one_id">{{ trans('cruds.item.fields.item_group_one') }}</label>
                <select class="form-control select2 {{ $errors->has('item_group_one') ? 'is-invalid' : '' }}" name="item_group_one_id" id="item_group_one_id">
                    @foreach($item_group_ones as $id => $entry)
                        <option value="{{ $id }}" {{ old('item_group_one_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('item_group_one'))
                    <span class="text-danger">{{ $errors->first('item_group_one') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.item.fields.item_group_one_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('item_akun_aktif') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="item_akun_aktif" value="0">
                    <input class="form-check-input" type="checkbox" name="item_akun_aktif" id="item_akun_aktif" value="1" {{ old('item_akun_aktif', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="item_akun_aktif">{{ trans('cruds.item.fields.item_akun_aktif') }}</label>
                </div>
                @if($errors->has('item_akun_aktif'))
                    <span class="text-danger">{{ $errors->first('item_akun_aktif') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.item.fields.item_akun_aktif_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.item.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Item::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.item.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="item_alias_nama">{{ trans('cruds.item.fields.item_alias_nama') }}</label>
                <input class="form-control {{ $errors->has('item_alias_nama') ? 'is-invalid' : '' }}" type="text" name="item_alias_nama" id="item_alias_nama" value="{{ old('item_alias_nama', '') }}">
                @if($errors->has('item_alias_nama'))
                    <span class="text-danger">{{ $errors->first('item_alias_nama') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.item.fields.item_alias_nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="item_group_two_id">{{ trans('cruds.item.fields.item_group_two') }}</label>
                <select class="form-control select2 {{ $errors->has('item_group_two') ? 'is-invalid' : '' }}" name="item_group_two_id" id="item_group_two_id">
                    @foreach($item_group_twos as $id => $entry)
                        <option value="{{ $id }}" {{ old('item_group_two_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('item_group_two'))
                    <span class="text-danger">{{ $errors->first('item_group_two') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.item.fields.item_group_two_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="item_group_three_id">{{ trans('cruds.item.fields.item_group_three') }}</label>
                <select class="form-control select2 {{ $errors->has('item_group_three') ? 'is-invalid' : '' }}" name="item_group_three_id" id="item_group_three_id">
                    @foreach($item_group_threes as $id => $entry)
                        <option value="{{ $id }}" {{ old('item_group_three_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('item_group_three'))
                    <span class="text-danger">{{ $errors->first('item_group_three') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.item.fields.item_group_three_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="item_satuan_one">{{ trans('cruds.item.fields.item_satuan_one') }}</label>
                <input class="form-control {{ $errors->has('item_satuan_one') ? 'is-invalid' : '' }}" type="number" name="item_satuan_one" id="item_satuan_one" value="{{ old('item_satuan_one', '') }}" step="1">
                @if($errors->has('item_satuan_one'))
                    <span class="text-danger">{{ $errors->first('item_satuan_one') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.item.fields.item_satuan_one_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="item_satuan_two">{{ trans('cruds.item.fields.item_satuan_two') }}</label>
                <input class="form-control {{ $errors->has('item_satuan_two') ? 'is-invalid' : '' }}" type="number" name="item_satuan_two" id="item_satuan_two" value="{{ old('item_satuan_two', '') }}" step="1">
                @if($errors->has('item_satuan_two'))
                    <span class="text-danger">{{ $errors->first('item_satuan_two') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.item.fields.item_satuan_two_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="item_satuan_three">{{ trans('cruds.item.fields.item_satuan_three') }}</label>
                <input class="form-control {{ $errors->has('item_satuan_three') ? 'is-invalid' : '' }}" type="number" name="item_satuan_three" id="item_satuan_three" value="{{ old('item_satuan_three', '') }}" step="1">
                @if($errors->has('item_satuan_three'))
                    <span class="text-danger">{{ $errors->first('item_satuan_three') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.item.fields.item_satuan_three_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="item_akun_pembelian_id">{{ trans('cruds.item.fields.item_akun_pembelian') }}</label>
                <select class="form-control select2 {{ $errors->has('item_akun_pembelian') ? 'is-invalid' : '' }}" name="item_akun_pembelian_id" id="item_akun_pembelian_id">
                    @foreach($item_akun_pembelians as $id => $entry)
                        <option value="{{ $id }}" {{ old('item_akun_pembelian_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('item_akun_pembelian'))
                    <span class="text-danger">{{ $errors->first('item_akun_pembelian') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.item.fields.item_akun_pembelian_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="item_akun_hpp_id">{{ trans('cruds.item.fields.item_akun_hpp') }}</label>
                <select class="form-control select2 {{ $errors->has('item_akun_hpp') ? 'is-invalid' : '' }}" name="item_akun_hpp_id" id="item_akun_hpp_id">
                    @foreach($item_akun_hpps as $id => $entry)
                        <option value="{{ $id }}" {{ old('item_akun_hpp_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('item_akun_hpp'))
                    <span class="text-danger">{{ $errors->first('item_akun_hpp') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.item.fields.item_akun_hpp_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="item_akun_penjualan_id">{{ trans('cruds.item.fields.item_akun_penjualan') }}</label>
                <select class="form-control select2 {{ $errors->has('item_akun_penjualan') ? 'is-invalid' : '' }}" name="item_akun_penjualan_id" id="item_akun_penjualan_id">
                    @foreach($item_akun_penjualans as $id => $entry)
                        <option value="{{ $id }}" {{ old('item_akun_penjualan_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('item_akun_penjualan'))
                    <span class="text-danger">{{ $errors->first('item_akun_penjualan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.item.fields.item_akun_penjualan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="item_akun_return_penjualan_id">{{ trans('cruds.item.fields.item_akun_return_penjualan') }}</label>
                <select class="form-control select2 {{ $errors->has('item_akun_return_penjualan') ? 'is-invalid' : '' }}" name="item_akun_return_penjualan_id" id="item_akun_return_penjualan_id">
                    @foreach($item_akun_return_penjualans as $id => $entry)
                        <option value="{{ $id }}" {{ old('item_akun_return_penjualan_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('item_akun_return_penjualan'))
                    <span class="text-danger">{{ $errors->first('item_akun_return_penjualan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.item.fields.item_akun_return_penjualan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo">{{ trans('cruds.item.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <span class="text-danger">{{ $errors->first('photo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.item.fields.photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="satuans">{{ trans('cruds.item.fields.satuan') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('satuans') ? 'is-invalid' : '' }}" name="satuans[]" id="satuans" multiple>
                    @foreach($satuans as $id => $satuan)
                        <option value="{{ $id }}" {{ in_array($id, old('satuans', [])) ? 'selected' : '' }}>{{ $satuan }}</option>
                    @endforeach
                </select>
                @if($errors->has('satuans'))
                    <span class="text-danger">{{ $errors->first('satuans') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.item.fields.satuan_helper') }}</span>
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
    var uploadedPhotoMap = {}
Dropzone.options.photoDropzone = {
    url: '{{ route('admin.items.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="photo[]" value="' + response.name + '">')
      uploadedPhotoMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPhotoMap[file.name]
      }
      $('form').find('input[name="photo[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($item) && $item->photo)
      var files = {!! json_encode($item->photo) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="photo[]" value="' + file.file_name + '">')
        }
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