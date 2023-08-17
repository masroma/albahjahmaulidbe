@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.hargaJualItem.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.harga-jual-items.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.hargaJualItem.fields.id') }}
                        </th>
                        <td>
                            {{ $hargaJualItem->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hargaJualItem.fields.item') }}
                        </th>
                        <td>
                            {{ $hargaJualItem->item->item_nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hargaJualItem.fields.level_harga') }}
                        </th>
                        <td>
                            {{ $hargaJualItem->level_harga->keterangan ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hargaJualItem.fields.mata_uang') }}
                        </th>
                        <td>
                            {{ $hargaJualItem->mata_uang->mata_uang ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hargaJualItem.fields.harga_satuan_1') }}
                        </th>
                        <td>
                            {{ $hargaJualItem->harga_satuan_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hargaJualItem.fields.diskon_satuan_1') }}
                        </th>
                        <td>
                            {{ $hargaJualItem->diskon_satuan_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hargaJualItem.fields.harga_satuan_2') }}
                        </th>
                        <td>
                            {{ $hargaJualItem->harga_satuan_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hargaJualItem.fields.diskon_satuan_2') }}
                        </th>
                        <td>
                            {{ $hargaJualItem->diskon_satuan_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hargaJualItem.fields.harga_satuan_3') }}
                        </th>
                        <td>
                            {{ $hargaJualItem->harga_satuan_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hargaJualItem.fields.diskon_satuan_3') }}
                        </th>
                        <td>
                            {{ $hargaJualItem->diskon_satuan_3 }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.harga-jual-items.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection