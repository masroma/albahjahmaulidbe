@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.itemGroupTwo.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.item-group-twos.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="kode">{{ trans('cruds.itemGroupTwo.fields.kode') }}</label>
                <input class="form-control {{ $errors->has('kode') ? 'is-invalid' : '' }}" type="text" name="kode" id="kode" value="{{ old('kode', '') }}" required>
                @if($errors->has('kode'))
                    <span class="text-danger">{{ $errors->first('kode') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.itemGroupTwo.fields.kode_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama">{{ trans('cruds.itemGroupTwo.fields.nama') }}</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama', '') }}" required>
                @if($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.itemGroupTwo.fields.nama_helper') }}</span>
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