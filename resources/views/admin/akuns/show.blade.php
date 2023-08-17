@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.akun.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.akuns.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.akun.fields.id') }}
                        </th>
                        <td>
                            {{ $akun->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.akun.fields.akun_kode') }}
                        </th>
                        <td>
                            {{ $akun->akun_kode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.akun.fields.akun_nama') }}
                        </th>
                        <td>
                            {{ $akun->akun_nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.akun.fields.akun_parent') }}
                        </th>
                        <td>
                            {{ $akun->akun_parent->nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.akun.fields.akun_jenis') }}
                        </th>
                        <td>
                            {{ $akun->akun_jenis->nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.akun.fields.akun_klasifikasi') }}
                        </th>
                        <td>
                            {{ $akun->akun_klasifikasi->nama ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.akuns.index') }}">
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
            <a class="nav-link" href="#item_akun_pembelian_items" role="tab" data-toggle="tab">
                {{ trans('cruds.item.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#item_akun_hpp_items" role="tab" data-toggle="tab">
                {{ trans('cruds.item.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#item_akun_penjualan_items" role="tab" data-toggle="tab">
                {{ trans('cruds.item.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#item_akun_return_penjualan_items" role="tab" data-toggle="tab">
                {{ trans('cruds.item.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="item_akun_pembelian_items">
            @includeIf('admin.akuns.relationships.itemAkunPembelianItems', ['items' => $akun->itemAkunPembelianItems])
        </div>
        <div class="tab-pane" role="tabpanel" id="item_akun_hpp_items">
            @includeIf('admin.akuns.relationships.itemAkunHppItems', ['items' => $akun->itemAkunHppItems])
        </div>
        <div class="tab-pane" role="tabpanel" id="item_akun_penjualan_items">
            @includeIf('admin.akuns.relationships.itemAkunPenjualanItems', ['items' => $akun->itemAkunPenjualanItems])
        </div>
        <div class="tab-pane" role="tabpanel" id="item_akun_return_penjualan_items">
            @includeIf('admin.akuns.relationships.itemAkunReturnPenjualanItems', ['items' => $akun->itemAkunReturnPenjualanItems])
        </div>
    </div>
</div>

@endsection