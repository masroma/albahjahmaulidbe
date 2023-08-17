@extends('layouts.admin')
@section('content')
@can('mesin_edc_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.mesin-edcs.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.mesinEdc.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.mesinEdc.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-MesinEdc">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.mesinEdc.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.mesinEdc.fields.kode_edc') }}
                    </th>
                    <th>
                        {{ trans('cruds.mesinEdc.fields.nama_edc') }}
                    </th>
                    <th>
                        {{ trans('cruds.mesinEdc.fields.bank') }}
                    </th>
                    <th>
                        {{ trans('cruds.mesinEdc.fields.cabang') }}
                    </th>
                    <th>
                        {{ trans('cruds.mesinEdc.fields.keterangan') }}
                    </th>
                    <th>
                        {{ trans('cruds.mesinEdc.fields.aktif') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('mesin_edc_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.mesin-edcs.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.mesin-edcs.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'kode_edc', name: 'kode_edc' },
{ data: 'nama_edc', name: 'nama_edc' },
{ data: 'bank', name: 'bank' },
{ data: 'cabang', name: 'cabang' },
{ data: 'keterangan', name: 'keterangan' },
{ data: 'aktif', name: 'aktif' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-MesinEdc').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection