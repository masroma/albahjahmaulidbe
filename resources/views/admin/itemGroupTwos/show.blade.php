@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.itemGroupTwo.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.item-group-twos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.itemGroupTwo.fields.id') }}
                        </th>
                        <td>
                            {{ $itemGroupTwo->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemGroupTwo.fields.kode') }}
                        </th>
                        <td>
                            {{ $itemGroupTwo->kode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemGroupTwo.fields.nama') }}
                        </th>
                        <td>
                            {{ $itemGroupTwo->nama }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.item-group-twos.index') }}">
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
            <a class="nav-link" href="#item_group_two_items" role="tab" data-toggle="tab">
                {{ trans('cruds.item.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="item_group_two_items">
            @includeIf('admin.itemGroupTwos.relationships.itemGroupTwoItems', ['items' => $itemGroupTwo->itemGroupTwoItems])
        </div>
    </div>
</div>

@endsection