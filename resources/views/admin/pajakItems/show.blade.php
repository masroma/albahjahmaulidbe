@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pajakItem.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pajak-items.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pajakItem.fields.id') }}
                        </th>
                        <td>
                            {{ $pajakItem->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pajakItem.fields.item') }}
                        </th>
                        <td>
                            {{ $pajakItem->item->item_nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pajakItem.fields.pajak') }}
                        </th>
                        <td>
                            {{ $pajakItem->pajak->nama_pajak ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pajakItem.fields.perhitungan') }}
                        </th>
                        <td>
                            {{ App\Models\PajakItem::PERHITUNGAN_SELECT[$pajakItem->perhitungan] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pajakItem.fields.tipe_pajak_item') }}
                        </th>
                        <td>
                            {{ App\Models\PajakItem::TIPE_PAJAK_ITEM_SELECT[$pajakItem->tipe_pajak_item] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pajak-items.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection