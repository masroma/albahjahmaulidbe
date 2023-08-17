@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.mataUang.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mata-uangs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.mataUang.fields.id') }}
                        </th>
                        <td>
                            {{ $mataUang->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mataUang.fields.kode') }}
                        </th>
                        <td>
                            {{ $mataUang->kode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mataUang.fields.mata_uang') }}
                        </th>
                        <td>
                            {{ $mataUang->mata_uang }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mataUang.fields.simbol') }}
                        </th>
                        <td>
                            {{ $mataUang->simbol }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mataUang.fields.kurs') }}
                        </th>
                        <td>
                            {{ $mataUang->kurs }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mataUang.fields.fiskal') }}
                        </th>
                        <td>
                            {{ $mataUang->fiskal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mataUang.fields.rate_type') }}
                        </th>
                        <td>
                            {{ App\Models\MataUang::RATE_TYPE_SELECT[$mataUang->rate_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mataUang.fields.default') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $mataUang->default ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mata-uangs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection