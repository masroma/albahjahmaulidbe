@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.itemGroupThree.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.item-group-threes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.itemGroupThree.fields.id') }}
                        </th>
                        <td>
                            {{ $itemGroupThree->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemGroupThree.fields.kode') }}
                        </th>
                        <td>
                            {{ $itemGroupThree->kode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemGroupThree.fields.nama') }}
                        </th>
                        <td>
                            {{ $itemGroupThree->nama }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.item-group-threes.index') }}">
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
            <a class="nav-link" href="#item_group_three_items" role="tab" data-toggle="tab">
                {{ trans('cruds.item.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="item_group_three_items">
            @includeIf('admin.itemGroupThrees.relationships.itemGroupThreeItems', ['items' => $itemGroupThree->itemGroupThreeItems])
        </div>
    </div>
</div>

@endsection