@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.stokItem.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.stok-items.update", [$stokItem->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="item_id">{{ trans('cruds.stokItem.fields.item') }}</label>
                <select class="form-control select2 {{ $errors->has('item') ? 'is-invalid' : '' }}" name="item_id" id="item_id">
                    @foreach($items as $id => $entry)
                        <option value="{{ $id }}" {{ (old('item_id') ? old('item_id') : $stokItem->item->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('item'))
                    <span class="text-danger">{{ $errors->first('item') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.stokItem.fields.item_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="location">{{ trans('cruds.stokItem.fields.location') }}</label>
                <input class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" type="text" name="location" id="location" value="{{ old('location', $stokItem->location) }}">
                @if($errors->has('location'))
                    <span class="text-danger">{{ $errors->first('location') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.stokItem.fields.location_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="qty">{{ trans('cruds.stokItem.fields.qty') }}</label>
                <input class="form-control {{ $errors->has('qty') ? 'is-invalid' : '' }}" type="text" name="qty" id="qty" value="{{ old('qty', $stokItem->qty) }}">
                @if($errors->has('qty'))
                    <span class="text-danger">{{ $errors->first('qty') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.stokItem.fields.qty_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pid">{{ trans('cruds.stokItem.fields.pid') }}</label>
                <input class="form-control {{ $errors->has('pid') ? 'is-invalid' : '' }}" type="text" name="pid" id="pid" value="{{ old('pid', $stokItem->pid) }}">
                @if($errors->has('pid'))
                    <span class="text-danger">{{ $errors->first('pid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.stokItem.fields.pid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hpp">{{ trans('cruds.stokItem.fields.hpp') }}</label>
                <input class="form-control {{ $errors->has('hpp') ? 'is-invalid' : '' }}" type="text" name="hpp" id="hpp" value="{{ old('hpp', $stokItem->hpp) }}">
                @if($errors->has('hpp'))
                    <span class="text-danger">{{ $errors->first('hpp') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.stokItem.fields.hpp_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="min">{{ trans('cruds.stokItem.fields.min') }}</label>
                <input class="form-control {{ $errors->has('min') ? 'is-invalid' : '' }}" type="text" name="min" id="min" value="{{ old('min', $stokItem->min) }}">
                @if($errors->has('min'))
                    <span class="text-danger">{{ $errors->first('min') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.stokItem.fields.min_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="max">{{ trans('cruds.stokItem.fields.max') }}</label>
                <input class="form-control {{ $errors->has('max') ? 'is-invalid' : '' }}" type="text" name="max" id="max" value="{{ old('max', $stokItem->max) }}">
                @if($errors->has('max'))
                    <span class="text-danger">{{ $errors->first('max') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.stokItem.fields.max_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="re_order">{{ trans('cruds.stokItem.fields.re_order') }}</label>
                <input class="form-control {{ $errors->has('re_order') ? 'is-invalid' : '' }}" type="text" name="re_order" id="re_order" value="{{ old('re_order', $stokItem->re_order) }}">
                @if($errors->has('re_order'))
                    <span class="text-danger">{{ $errors->first('re_order') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.stokItem.fields.re_order_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection