@extends('layouts.admin')
@section('content')
@can('akun_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.akuns.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.akun.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.akun.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Akun">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.akun.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.akun.fields.akun_kode') }}
                        </th>
                        <th>
                            {{ trans('cruds.akun.fields.akun_nama') }}
                        </th>
                        <th>
                            {{ trans('cruds.akun.fields.akun_parent') }}
                        </th>
                        <th>
                            {{ trans('cruds.akun.fields.akun_jenis') }}
                        </th>
                        <th>
                            {{ trans('cruds.akun.fields.akun_klasifikasi') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($akun_parents as $key => $item)
                                    <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($akun_jenis as $key => $item)
                                    <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($akun_klasifikasis as $key => $item)
                                    <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($akuns as $key => $akun)
                        <tr data-entry-id="{{ $akun->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $akun->id ?? '' }}
                            </td>
                            <td>
                                {{ $akun->akun_kode ?? '' }}
                            </td>
                            <td>
                                {{ $akun->akun_nama ?? '' }}
                            </td>
                            <td>
                                {{ $akun->akun_parent->nama ?? '' }}
                            </td>
                            <td>
                                {{ $akun->akun_jenis->nama ?? '' }}
                            </td>
                            <td>
                                {{ $akun->akun_klasifikasi->nama ?? '' }}
                            </td>
                            <td>
                                @can('akun_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.akuns.show', $akun->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('akun_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.akuns.edit', $akun->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('akun_delete')
                                    <form action="{{ route('admin.akuns.destroy', $akun->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('akun_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.akuns.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  });
  let table = $('.datatable-Akun:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection