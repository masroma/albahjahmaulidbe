@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.satuan.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.satuans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.satuan.fields.id') }}
                        </th>
                        <td>
                            {{ $satuan->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.satuan.fields.satuan_1') }}
                        </th>
                        <td>
                            {{ $satuan->satuan_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.satuan.fields.satuan_2') }}
                        </th>
                        <td>
                            {{ $satuan->satuan_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.satuan.fields.isi_2') }}
                        </th>
                        <td>
                            {{ $satuan->isi_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.satuan.fields.satuan_3') }}
                        </th>
                        <td>
                            {{ $satuan->satuan_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.satuan.fields.isi_3') }}
                        </th>
                        <td>
                            {{ $satuan->isi_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.satuan.fields.satuan_pembelian') }}
                        </th>
                        <td>
                            {{ $satuan->satuan_pembelian }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.satuan.fields.satuan_penjualan') }}
                        </th>
                        <td>
                            {{ $satuan->satuan_penjualan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.satuan.fields.satuan_stok') }}
                        </th>
                        <td>
                            {{ $satuan->satuan_stok }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.satuans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection