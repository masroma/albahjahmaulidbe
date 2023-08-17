@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.cabang.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.cabangs.update", [$cabang->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="kode">{{ trans('cruds.cabang.fields.kode') }}</label>
                <input class="form-control {{ $errors->has('kode') ? 'is-invalid' : '' }}" type="text" name="kode" id="kode" value="{{ old('kode', $cabang->kode) }}" required>
                @if($errors->has('kode'))
                    <span class="text-danger">{{ $errors->first('kode') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cabang.fields.kode_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama">{{ trans('cruds.cabang.fields.nama') }}</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama', $cabang->nama) }}" required>
                @if($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cabang.fields.nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nama_perusahaan_cabang">{{ trans('cruds.cabang.fields.nama_perusahaan_cabang') }}</label>
                <input class="form-control {{ $errors->has('nama_perusahaan_cabang') ? 'is-invalid' : '' }}" type="text" name="nama_perusahaan_cabang" id="nama_perusahaan_cabang" value="{{ old('nama_perusahaan_cabang', $cabang->nama_perusahaan_cabang) }}">
                @if($errors->has('nama_perusahaan_cabang'))
                    <span class="text-danger">{{ $errors->first('nama_perusahaan_cabang') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cabang.fields.nama_perusahaan_cabang_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alamat">{{ trans('cruds.cabang.fields.alamat') }}</label>
                <input class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" type="text" name="alamat" id="alamat" value="{{ old('alamat', $cabang->alamat) }}">
                @if($errors->has('alamat'))
                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cabang.fields.alamat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telephone">{{ trans('cruds.cabang.fields.telephone') }}</label>
                <input class="form-control {{ $errors->has('telephone') ? 'is-invalid' : '' }}" type="text" name="telephone" id="telephone" value="{{ old('telephone', $cabang->telephone) }}">
                @if($errors->has('telephone'))
                    <span class="text-danger">{{ $errors->first('telephone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cabang.fields.telephone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fax">{{ trans('cruds.cabang.fields.fax') }}</label>
                <input class="form-control {{ $errors->has('fax') ? 'is-invalid' : '' }}" type="text" name="fax" id="fax" value="{{ old('fax', $cabang->fax) }}">
                @if($errors->has('fax'))
                    <span class="text-danger">{{ $errors->first('fax') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cabang.fields.fax_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="npwp">{{ trans('cruds.cabang.fields.npwp') }}</label>
                <input class="form-control {{ $errors->has('npwp') ? 'is-invalid' : '' }}" type="text" name="npwp" id="npwp" value="{{ old('npwp', $cabang->npwp) }}">
                @if($errors->has('npwp'))
                    <span class="text-danger">{{ $errors->first('npwp') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cabang.fields.npwp_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pkp">{{ trans('cruds.cabang.fields.pkp') }}</label>
                <input class="form-control {{ $errors->has('pkp') ? 'is-invalid' : '' }}" type="text" name="pkp" id="pkp" value="{{ old('pkp', $cabang->pkp) }}">
                @if($errors->has('pkp'))
                    <span class="text-danger">{{ $errors->first('pkp') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cabang.fields.pkp_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="default_customer_id">{{ trans('cruds.cabang.fields.default_customer') }}</label>
                <select class="form-control select2 {{ $errors->has('default_customer') ? 'is-invalid' : '' }}" name="default_customer_id" id="default_customer_id">
                    @foreach($default_customers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('default_customer_id') ? old('default_customer_id') : $cabang->default_customer->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('default_customer'))
                    <span class="text-danger">{{ $errors->first('default_customer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cabang.fields.default_customer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="logo_cabang">{{ trans('cruds.cabang.fields.logo_cabang') }}</label>
                <div class="needsclick dropzone {{ $errors->has('logo_cabang') ? 'is-invalid' : '' }}" id="logo_cabang-dropzone">
                </div>
                @if($errors->has('logo_cabang'))
                    <span class="text-danger">{{ $errors->first('logo_cabang') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cabang.fields.logo_cabang_helper') }}</span>
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
    Dropzone.options.logoCabangDropzone = {
    url: '{{ route('admin.cabangs.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
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
      $('form').find('input[name="logo_cabang"]').remove()
      $('form').append('<input type="hidden" name="logo_cabang" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo_cabang"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($cabang) && $cabang->logo_cabang)
      var file = {!! json_encode($cabang->logo_cabang) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo_cabang" value="' + file.file_name + '">')
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