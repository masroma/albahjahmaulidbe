@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.levelHarga.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.level-hargas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.levelHarga.fields.id') }}
                        </th>
                        <td>
                            {{ $levelHarga->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.levelHarga.fields.code') }}
                        </th>
                        <td>
                            {{ $levelHarga->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.levelHarga.fields.keterangan') }}
                        </th>
                        <td>
                            {{ $levelHarga->keterangan }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.level-hargas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection