@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.test.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tests.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="test">{{ trans('cruds.test.fields.test') }}</label>
                <input class="form-control {{ $errors->has('test') ? 'is-invalid' : '' }}" type="text" name="test" id="test" value="{{ old('test', '') }}">
                @if($errors->has('test'))
                    <span class="text-danger">{{ $errors->first('test') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.test_helper') }}</span>
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