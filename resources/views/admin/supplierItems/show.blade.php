@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.supplierItem.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.supplier-items.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.supplierItem.fields.id') }}
                        </th>
                        <td>
                            {{ $supplierItem->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supplierItem.fields.supplier_utama') }}
                        </th>
                        <td>
                            @foreach($supplierItem->supplier_utamas as $key => $supplier_utama)
                                <span class="label label-info">{{ $supplier_utama->nama }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supplierItem.fields.kode_barang_supplier') }}
                        </th>
                        <td>
                            {{ $supplierItem->kode_barang_supplier }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supplierItem.fields.lama_pemesanan') }}
                        </th>
                        <td>
                            {{ $supplierItem->lama_pemesanan }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.supplier-items.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection