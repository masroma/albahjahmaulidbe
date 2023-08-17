@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.hutangPiutangMitraBisni.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.hutang-piutang-mitra-bisnis.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="mitra_bisnis">{{ trans('cruds.hutangPiutangMitraBisni.fields.mitra_bisnis') }}</label>
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
                <span class="help-block">{{ trans('cruds.hutangPiutangMitraBisni.fields.mitra_bisnis_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mata_uangs">{{ trans('cruds.hutangPiutangMitraBisni.fields.mata_uang') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('mata_uangs') ? 'is-invalid' : '' }}" name="mata_uangs[]" id="mata_uangs" multiple>
                    @foreach($mata_uangs as $id => $mata_uang)
                        <option value="{{ $id }}" {{ in_array($id, old('mata_uangs', [])) ? 'selected' : '' }}>{{ $mata_uang }}</option>
                    @endforeach
                </select>
                @if($errors->has('mata_uangs'))
                    <span class="text-danger">{{ $errors->first('mata_uangs') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hutangPiutangMitraBisni.fields.mata_uang_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.hutangPiutangMitraBisni.fields.pembelian_termin') }}</label>
                <select class="form-control {{ $errors->has('pembelian_termin') ? 'is-invalid' : '' }}" name="pembelian_termin" id="pembelian_termin">
                    <option value disabled {{ old('pembelian_termin', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\HutangPiutangMitraBisni::PEMBELIAN_TERMIN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('pembelian_termin', 'Credit') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('pembelian_termin'))
                    <span class="text-danger">{{ $errors->first('pembelian_termin') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hutangPiutangMitraBisni.fields.pembelian_termin_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pembelian_tempo">{{ trans('cruds.hutangPiutangMitraBisni.fields.pembelian_tempo') }}</label>
                <input class="form-control {{ $errors->has('pembelian_tempo') ? 'is-invalid' : '' }}" type="text" name="pembelian_tempo" id="pembelian_tempo" value="{{ old('pembelian_tempo', '') }}">
                @if($errors->has('pembelian_tempo'))
                    <span class="text-danger">{{ $errors->first('pembelian_tempo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hutangPiutangMitraBisni.fields.pembelian_tempo_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.hutangPiutangMitraBisni.fields.penjualan_termin') }}</label>
                <select class="form-control {{ $errors->has('penjualan_termin') ? 'is-invalid' : '' }}" name="penjualan_termin" id="penjualan_termin">
                    <option value disabled {{ old('penjualan_termin', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\HutangPiutangMitraBisni::PENJUALAN_TERMIN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('penjualan_termin', 'Credit') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('penjualan_termin'))
                    <span class="text-danger">{{ $errors->first('penjualan_termin') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hutangPiutangMitraBisni.fields.penjualan_termin_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="penjualan_tempo">{{ trans('cruds.hutangPiutangMitraBisni.fields.penjualan_tempo') }}</label>
                <input class="form-control {{ $errors->has('penjualan_tempo') ? 'is-invalid' : '' }}" type="text" name="penjualan_tempo" id="penjualan_tempo" value="{{ old('penjualan_tempo', '') }}">
                @if($errors->has('penjualan_tempo'))
                    <span class="text-danger">{{ $errors->first('penjualan_tempo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hutangPiutangMitraBisni.fields.penjualan_tempo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="batas_hutang">{{ trans('cruds.hutangPiutangMitraBisni.fields.batas_hutang') }}</label>
                <input class="form-control {{ $errors->has('batas_hutang') ? 'is-invalid' : '' }}" type="text" name="batas_hutang" id="batas_hutang" value="{{ old('batas_hutang', '') }}">
                @if($errors->has('batas_hutang'))
                    <span class="text-danger">{{ $errors->first('batas_hutang') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hutangPiutangMitraBisni.fields.batas_hutang_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="batas_frekuensi_hutang">{{ trans('cruds.hutangPiutangMitraBisni.fields.batas_frekuensi_hutang') }}</label>
                <input class="form-control {{ $errors->has('batas_frekuensi_hutang') ? 'is-invalid' : '' }}" type="text" name="batas_frekuensi_hutang" id="batas_frekuensi_hutang" value="{{ old('batas_frekuensi_hutang', '') }}">
                @if($errors->has('batas_frekuensi_hutang'))
                    <span class="text-danger">{{ $errors->first('batas_frekuensi_hutang') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hutangPiutangMitraBisni.fields.batas_frekuensi_hutang_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="akun_hutangs">{{ trans('cruds.hutangPiutangMitraBisni.fields.akun_hutang') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('akun_hutangs') ? 'is-invalid' : '' }}" name="akun_hutangs[]" id="akun_hutangs" multiple>
                    @foreach($akun_hutangs as $id => $akun_hutang)
                        <option value="{{ $id }}" {{ in_array($id, old('akun_hutangs', [])) ? 'selected' : '' }}>{{ $akun_hutang }}</option>
                    @endforeach
                </select>
                @if($errors->has('akun_hutangs'))
                    <span class="text-danger">{{ $errors->first('akun_hutangs') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hutangPiutangMitraBisni.fields.akun_hutang_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="batas_piutang">{{ trans('cruds.hutangPiutangMitraBisni.fields.batas_piutang') }}</label>
                <input class="form-control {{ $errors->has('batas_piutang') ? 'is-invalid' : '' }}" type="text" name="batas_piutang" id="batas_piutang" value="{{ old('batas_piutang', '') }}">
                @if($errors->has('batas_piutang'))
                    <span class="text-danger">{{ $errors->first('batas_piutang') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hutangPiutangMitraBisni.fields.batas_piutang_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="batas_frekuensi_piutang">{{ trans('cruds.hutangPiutangMitraBisni.fields.batas_frekuensi_piutang') }}</label>
                <input class="form-control {{ $errors->has('batas_frekuensi_piutang') ? 'is-invalid' : '' }}" type="text" name="batas_frekuensi_piutang" id="batas_frekuensi_piutang" value="{{ old('batas_frekuensi_piutang', '') }}">
                @if($errors->has('batas_frekuensi_piutang'))
                    <span class="text-danger">{{ $errors->first('batas_frekuensi_piutang') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hutangPiutangMitraBisni.fields.batas_frekuensi_piutang_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="akun_stakeholder_piutangs">{{ trans('cruds.hutangPiutangMitraBisni.fields.akun_stakeholder_piutang') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('akun_stakeholder_piutangs') ? 'is-invalid' : '' }}" name="akun_stakeholder_piutangs[]" id="akun_stakeholder_piutangs" multiple>
                    @foreach($akun_stakeholder_piutangs as $id => $akun_stakeholder_piutang)
                        <option value="{{ $id }}" {{ in_array($id, old('akun_stakeholder_piutangs', [])) ? 'selected' : '' }}>{{ $akun_stakeholder_piutang }}</option>
                    @endforeach
                </select>
                @if($errors->has('akun_stakeholder_piutangs'))
                    <span class="text-danger">{{ $errors->first('akun_stakeholder_piutangs') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hutangPiutangMitraBisni.fields.akun_stakeholder_piutang_helper') }}</span>
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