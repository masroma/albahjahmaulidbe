@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.item.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.items.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.item.fields.id') }}
                        </th>
                        <td>
                            {{ $item->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.item.fields.item_kode') }}
                        </th>
                        <td>
                            {{ $item->item_kode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.item.fields.item_nama') }}
                        </th>
                        <td>
                            {{ $item->item_nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.item.fields.barcode') }}
                        </th>
                        <td>
                            {{ $item->barcode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.item.fields.item_merk') }}
                        </th>
                        <td>
                            {{ $item->item_merk->nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.item.fields.item_group_one') }}
                        </th>
                        <td>
                            {{ $item->item_group_one->nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.item.fields.item_akun_aktif') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $item->item_akun_aktif ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.item.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Item::STATUS_SELECT[$item->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.item.fields.item_alias_nama') }}
                        </th>
                        <td>
                            {{ $item->item_alias_nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.item.fields.item_group_two') }}
                        </th>
                        <td>
                            {{ $item->item_group_two->nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.item.fields.item_group_three') }}
                        </th>
                        <td>
                            {{ $item->item_group_three->nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.item.fields.item_satuan_one') }}
                        </th>
                        <td>
                            {{ $item->item_satuan_one }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.item.fields.item_satuan_two') }}
                        </th>
                        <td>
                            {{ $item->item_satuan_two }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.item.fields.item_satuan_three') }}
                        </th>
                        <td>
                            {{ $item->item_satuan_three }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.item.fields.item_akun_pembelian') }}
                        </th>
                        <td>
                            {{ $item->item_akun_pembelian->akun_nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.item.fields.item_akun_hpp') }}
                        </th>
                        <td>
                            {{ $item->item_akun_hpp->akun_nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.item.fields.item_akun_penjualan') }}
                        </th>
                        <td>
                            {{ $item->item_akun_penjualan->akun_nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.item.fields.item_akun_return_penjualan') }}
                        </th>
                        <td>
                            {{ $item->item_akun_return_penjualan->akun_nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.item.fields.photo') }}
                        </th>
                        <td>
                            @foreach($item->photo as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.item.fields.satuan') }}
                        </th>
                        <td>
                            @foreach($item->satuans as $key => $satuan)
                                <span class="label label-info">{{ $satuan->satuan_1 }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.items.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection