@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.mitraBisni.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mitra-bisnis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.mitraBisni.fields.id') }}
                        </th>
                        <td>
                            {{ $mitraBisni->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mitraBisni.fields.kode') }}
                        </th>
                        <td>
                            {{ $mitraBisni->kode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mitraBisni.fields.nama') }}
                        </th>
                        <td>
                            {{ $mitraBisni->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mitraBisni.fields.deskripsi') }}
                        </th>
                        <td>
                            {{ $mitraBisni->deskripsi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mitraBisni.fields.aktif') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $mitraBisni->aktif ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mitraBisni.fields.tipe_bisnis_customer') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $mitraBisni->tipe_bisnis_customer ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mitraBisni.fields.tipe_bisnis_supplier') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $mitraBisni->tipe_bisnis_supplier ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mitraBisni.fields.group_1') }}
                        </th>
                        <td>
                            @foreach($mitraBisni->group_1s as $key => $group_1)
                                <span class="label label-info">{{ $group_1->kode }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mitraBisni.fields.group_2') }}
                        </th>
                        <td>
                            @foreach($mitraBisni->group_2s as $key => $group_2)
                                <span class="label label-info">{{ $group_2->kode }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mitraBisni.fields.group_3') }}
                        </th>
                        <td>
                            @foreach($mitraBisni->group_3s as $key => $group_3)
                                <span class="label label-info">{{ $group_3->kode }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mitraBisni.fields.level_harga') }}
                        </th>
                        <td>
                            @foreach($mitraBisni->level_hargas as $key => $level_harga)
                                <span class="label label-info">{{ $level_harga->keterangan }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mitraBisni.fields.sales') }}
                        </th>
                        <td>
                            @foreach($mitraBisni->sales as $key => $sales)
                                <span class="label label-info">{{ $sales->nama }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mitraBisni.fields.bank') }}
                        </th>
                        <td>
                            {{ $mitraBisni->bank }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mitraBisni.fields.no_rekening') }}
                        </th>
                        <td>
                            {{ $mitraBisni->no_rekening }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mitraBisni.fields.atas_nama') }}
                        </th>
                        <td>
                            {{ $mitraBisni->atas_nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mitraBisni.fields.npwp') }}
                        </th>
                        <td>
                            {{ $mitraBisni->npwp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mitraBisni.fields.pkp') }}
                        </th>
                        <td>
                            {{ $mitraBisni->pkp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mitraBisni.fields.tanggal_pkp') }}
                        </th>
                        <td>
                            {{ $mitraBisni->tanggal_pkp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mitraBisni.fields.no_nik') }}
                        </th>
                        <td>
                            {{ $mitraBisni->no_nik }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mitraBisni.fields.atas_nama_nik') }}
                        </th>
                        <td>
                            {{ $mitraBisni->atas_nama_nik }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mitraBisni.fields.pembelian_pajak') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $mitraBisni->pembelian_pajak ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mitraBisni.fields.penjualan_pajak') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $mitraBisni->penjualan_pajak ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mitraBisni.fields.image') }}
                        </th>
                        <td>
                            @if($mitraBisni->image)
                                <a href="{{ $mitraBisni->image->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mitra-bisnis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection