@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.kontakMitraBisni.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.kontak-mitra-bisnis.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="mitra_bisnis">{{ trans('cruds.kontakMitraBisni.fields.mitra_bisnis') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('mitra_bisnis') ? 'is-invalid' : '' }}" name="mitra_bisnis[]" id="mitra_bisnis" multiple>
                    @foreach($mitra_bisnis as $id => $mitra_bisni)
                        <option value="{{ $id }}" {{ in_array($id, old('mitra_bisnis', [])) ? 'selected' : '' }}>{{ $mitra_bisni }}</option>
                    @endforeach
                </select>
                @if($errors->has('mitra_bisnis'))
                    <span class="text-danger">{{ $errors->first('mitra_bisnis') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.kontakMitraBisni.fields.mitra_bisnis_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nama_kontak">{{ trans('cruds.kontakMitraBisni.fields.nama_kontak') }}</label>
                <input class="form-control {{ $errors->has('nama_kontak') ? 'is-invalid' : '' }}" type="text" name="nama_kontak" id="nama_kontak" value="{{ old('nama_kontak', '') }}">
                @if($errors->has('nama_kontak'))
                    <span class="text-danger">{{ $errors->first('nama_kontak') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.kontakMitraBisni.fields.nama_kontak_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jabatan">{{ trans('cruds.kontakMitraBisni.fields.jabatan') }}</label>
                <input class="form-control {{ $errors->has('jabatan') ? 'is-invalid' : '' }}" type="text" name="jabatan" id="jabatan" value="{{ old('jabatan', '') }}">
                @if($errors->has('jabatan'))
                    <span class="text-danger">{{ $errors->first('jabatan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.kontakMitraBisni.fields.jabatan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="handphone">{{ trans('cruds.kontakMitraBisni.fields.handphone') }}</label>
                <input class="form-control {{ $errors->has('handphone') ? 'is-invalid' : '' }}" type="text" name="handphone" id="handphone" value="{{ old('handphone', '') }}">
                @if($errors->has('handphone'))
                    <span class="text-danger">{{ $errors->first('handphone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.kontakMitraBisni.fields.handphone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.kontakMitraBisni.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}">
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.kontakMitraBisni.fields.email_helper') }}</span>
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