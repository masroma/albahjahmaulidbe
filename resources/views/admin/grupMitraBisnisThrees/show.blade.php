@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.grupMitraBisnisThree.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.grup-mitra-bisnis-threes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.grupMitraBisnisThree.fields.id') }}
                        </th>
                        <td>
                            {{ $grupMitraBisnisThree->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.grupMitraBisnisThree.fields.kode') }}
                        </th>
                        <td>
                            {{ $grupMitraBisnisThree->kode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.grupMitraBisnisThree.fields.keterangan') }}
                        </th>
                        <td>
                            {{ $grupMitraBisnisThree->keterangan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.grupMitraBisnisThree.fields.level') }}
                        </th>
                        <td>
                            {{ $grupMitraBisnisThree->level }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.grup-mitra-bisnis-threes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection