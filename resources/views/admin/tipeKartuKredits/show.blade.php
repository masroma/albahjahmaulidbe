@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tipeKartuKredit.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tipe-kartu-kredits.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tipeKartuKredit.fields.id') }}
                        </th>
                        <td>
                            {{ $tipeKartuKredit->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tipeKartuKredit.fields.kode') }}
                        </th>
                        <td>
                            {{ $tipeKartuKredit->kode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tipeKartuKredit.fields.nama_kartu_kredit') }}
                        </th>
                        <td>
                            {{ $tipeKartuKredit->nama_kartu_kredit }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tipe-kartu-kredits.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection