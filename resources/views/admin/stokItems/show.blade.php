@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.stokItem.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stok-items.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.stokItem.fields.id') }}
                        </th>
                        <td>
                            {{ $stokItem->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stokItem.fields.item') }}
                        </th>
                        <td>
                            {{ $stokItem->item->item_nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stokItem.fields.location') }}
                        </th>
                        <td>
                            {{ $stokItem->location }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stokItem.fields.qty') }}
                        </th>
                        <td>
                            {{ $stokItem->qty }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stokItem.fields.pid') }}
                        </th>
                        <td>
                            {{ $stokItem->pid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stokItem.fields.hpp') }}
                        </th>
                        <td>
                            {{ $stokItem->hpp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stokItem.fields.min') }}
                        </th>
                        <td>
                            {{ $stokItem->min }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stokItem.fields.max') }}
                        </th>
                        <td>
                            {{ $stokItem->max }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stokItem.fields.re_order') }}
                        </th>
                        <td>
                            {{ $stokItem->re_order }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stok-items.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection