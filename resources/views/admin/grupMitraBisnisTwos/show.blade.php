@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.grupMitraBisnisTwo.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.grup-mitra-bisnis-twos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.grupMitraBisnisTwo.fields.id') }}
                        </th>
                        <td>
                            {{ $grupMitraBisnisTwo->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.grupMitraBisnisTwo.fields.kode') }}
                        </th>
                        <td>
                            {{ $grupMitraBisnisTwo->kode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.grupMitraBisnisTwo.fields.keterangan') }}
                        </th>
                        <td>
                            {{ $grupMitraBisnisTwo->keterangan }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.grup-mitra-bisnis-twos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection