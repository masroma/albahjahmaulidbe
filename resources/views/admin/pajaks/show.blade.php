@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pajak.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pajaks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pajak.fields.id') }}
                        </th>
                        <td>
                            {{ $pajak->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pajak.fields.kode') }}
                        </th>
                        <td>
                            {{ $pajak->kode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pajak.fields.nama_pajak') }}
                        </th>
                        <td>
                            {{ $pajak->nama_pajak }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pajak.fields.akun_pembelian') }}
                        </th>
                        <td>
                            {{ $pajak->akun_pembelian->akun_kode ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pajak.fields.akun_penjualan') }}
                        </th>
                        <td>
                            {{ $pajak->akun_penjualan->akun_kode ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pajak.fields.presentasi_npwp') }}
                        </th>
                        <td>
                            {{ $pajak->presentasi_npwp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pajak.fields.presentasi_non_npwp') }}
                        </th>
                        <td>
                            {{ $pajak->presentasi_non_npwp }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pajaks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection