@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.tipeKartuKredit.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tipe-kartu-kredits.update", [$tipeKartuKredit->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="kode">{{ trans('cruds.tipeKartuKredit.fields.kode') }}</label>
                <input class="form-control {{ $errors->has('kode') ? 'is-invalid' : '' }}" type="text" name="kode" id="kode" value="{{ old('kode', $tipeKartuKredit->kode) }}" required>
                @if($errors->has('kode'))
                    <span class="text-danger">{{ $errors->first('kode') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tipeKartuKredit.fields.kode_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama_kartu_kredit">{{ trans('cruds.tipeKartuKredit.fields.nama_kartu_kredit') }}</label>
                <input class="form-control {{ $errors->has('nama_kartu_kredit') ? 'is-invalid' : '' }}" type="text" name="nama_kartu_kredit" id="nama_kartu_kredit" value="{{ old('nama_kartu_kredit', $tipeKartuKredit->nama_kartu_kredit) }}" required>
                @if($errors->has('nama_kartu_kredit'))
                    <span class="text-danger">{{ $errors->first('nama_kartu_kredit') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tipeKartuKredit.fields.nama_kartu_kredit_helper') }}</span>
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