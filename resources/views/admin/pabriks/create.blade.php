@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.pabrik.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pabriks.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nama_pabrik">{{ trans('cruds.pabrik.fields.nama_pabrik') }}</label>
                <input class="form-control {{ $errors->has('nama_pabrik') ? 'is-invalid' : '' }}" type="text" name="nama_pabrik" id="nama_pabrik" value="{{ old('nama_pabrik', '') }}" required>
                @if($errors->has('nama_pabrik'))
                    <span class="text-danger">{{ $errors->first('nama_pabrik') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pabrik.fields.nama_pabrik_helper') }}</span>
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