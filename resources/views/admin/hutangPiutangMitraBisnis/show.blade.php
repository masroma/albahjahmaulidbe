@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.hutangPiutangMitraBisni.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.hutang-piutang-mitra-bisnis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.hutangPiutangMitraBisni.fields.id') }}
                        </th>
                        <td>
                            {{ $hutangPiutangMitraBisni->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hutangPiutangMitraBisni.fields.mitra_bisnis') }}
                        </th>
                        <td>
                            @foreach($hutangPiutangMitraBisni->mitra_bisnis as $key => $mitra_bisnis)
                                <span class="label label-info">{{ $mitra_bisnis->nama }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hutangPiutangMitraBisni.fields.mata_uang') }}
                        </th>
                        <td>
                            @foreach($hutangPiutangMitraBisni->mata_uangs as $key => $mata_uang)
                                <span class="label label-info">{{ $mata_uang->mata_uang }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hutangPiutangMitraBisni.fields.pembelian_termin') }}
                        </th>
                        <td>
                            {{ App\Models\HutangPiutangMitraBisni::PEMBELIAN_TERMIN_SELECT[$hutangPiutangMitraBisni->pembelian_termin] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hutangPiutangMitraBisni.fields.pembelian_tempo') }}
                        </th>
                        <td>
                            {{ $hutangPiutangMitraBisni->pembelian_tempo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hutangPiutangMitraBisni.fields.penjualan_termin') }}
                        </th>
                        <td>
                            {{ App\Models\HutangPiutangMitraBisni::PENJUALAN_TERMIN_SELECT[$hutangPiutangMitraBisni->penjualan_termin] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hutangPiutangMitraBisni.fields.penjualan_tempo') }}
                        </th>
                        <td>
                            {{ $hutangPiutangMitraBisni->penjualan_tempo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hutangPiutangMitraBisni.fields.batas_hutang') }}
                        </th>
                        <td>
                            {{ $hutangPiutangMitraBisni->batas_hutang }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hutangPiutangMitraBisni.fields.batas_frekuensi_hutang') }}
                        </th>
                        <td>
                            {{ $hutangPiutangMitraBisni->batas_frekuensi_hutang }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hutangPiutangMitraBisni.fields.akun_hutang') }}
                        </th>
                        <td>
                            @foreach($hutangPiutangMitraBisni->akun_hutangs as $key => $akun_hutang)
                                <span class="label label-info">{{ $akun_hutang->akun_nama }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hutangPiutangMitraBisni.fields.batas_piutang') }}
                        </th>
                        <td>
                            {{ $hutangPiutangMitraBisni->batas_piutang }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hutangPiutangMitraBisni.fields.batas_frekuensi_piutang') }}
                        </th>
                        <td>
                            {{ $hutangPiutangMitraBisni->batas_frekuensi_piutang }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hutangPiutangMitraBisni.fields.akun_stakeholder_piutang') }}
                        </th>
                        <td>
                            @foreach($hutangPiutangMitraBisni->akun_stakeholder_piutangs as $key => $akun_stakeholder_piutang)
                                <span class="label label-info">{{ $akun_stakeholder_piutang->nama }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.hutang-piutang-mitra-bisnis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection