@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.akunParent.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.akun-parents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.akunParent.fields.id') }}
                        </th>
                        <td>
                            {{ $akunParent->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.akunParent.fields.kode') }}
                        </th>
                        <td>
                            {{ $akunParent->kode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.akunParent.fields.nama') }}
                        </th>
                        <td>
                            {{ $akunParent->nama }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.akun-parents.index') }}">
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
            <a class="nav-link" href="#akun_parent_akuns" role="tab" data-toggle="tab">
                {{ trans('cruds.akun.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="akun_parent_akuns">
            @includeIf('admin.akunParents.relationships.akunParentAkuns', ['akuns' => $akunParent->akunParentAkuns])
        </div>
    </div>
</div>

@endsection