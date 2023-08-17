@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.itemGroupOne.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.item-group-ones.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.itemGroupOne.fields.id') }}
                        </th>
                        <td>
                            {{ $itemGroupOne->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemGroupOne.fields.kode') }}
                        </th>
                        <td>
                            {{ $itemGroupOne->kode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemGroupOne.fields.nama') }}
                        </th>
                        <td>
                            {{ $itemGroupOne->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemGroupOne.fields.item_type') }}
                        </th>
                        <td>
                            {{ App\Models\ItemGroupOne::ITEM_TYPE_SELECT[$itemGroupOne->item_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemGroupOne.fields.akun_pembelian') }}
                        </th>
                        <td>
                            {{ App\Models\ItemGroupOne::AKUN_PEMBELIAN_SELECT[$itemGroupOne->akun_pembelian] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemGroupOne.fields.akun_hpp') }}
                        </th>
                        <td>
                            {{ App\Models\ItemGroupOne::AKUN_HPP_SELECT[$itemGroupOne->akun_hpp] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemGroupOne.fields.akun_penjualan') }}
                        </th>
                        <td>
                            {{ App\Models\ItemGroupOne::AKUN_PENJUALAN_SELECT[$itemGroupOne->akun_penjualan] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemGroupOne.fields.akun_retur_penjualan') }}
                        </th>
                        <td>
                            {{ $itemGroupOne->akun_retur_penjualan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemGroupOne.fields.tampil_pos') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $itemGroupOne->tampil_pos ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.item-group-ones.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#item_group_one_items" role="tab" data-toggle="tab">
                {{ trans('cruds.item.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="item_group_one_items">
            @includeIf('admin.itemGroupOnes.relationships.itemGroupOneItems', ['items' => $itemGroupOne->itemGroupOneItems])
        </div>
    </div>
</div>

@endsection