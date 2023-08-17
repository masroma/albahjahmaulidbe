@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.grupMitraBisnisOne.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.grup-mitra-bisnis-ones.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.grupMitraBisnisOne.fields.kode') }}
                        </th>
                        <td>
                            {{ $grupMitraBisnisOne->kode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.grupMitraBisnisOne.fields.keterangan') }}
                        </th>
                        <td>
                            {{ $grupMitraBisnisOne->keterangan }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.grup-mitra-bisnis-ones.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection