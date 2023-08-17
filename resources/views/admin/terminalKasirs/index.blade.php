@extends('layouts.admin')
@section('content')
@can('terminal_kasir_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.terminal-kasirs.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.terminalKasir.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.terminalKasir.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-TerminalKasir">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.terminalKasir.fields.kode_pos') }}
                    </th>
                    <th>
                        {{ trans('cruds.terminalKasir.fields.nama') }}
                    </th>
                    <th>
                        {{ trans('cruds.terminalKasir.fields.cabang') }}
                    </th>
                    <th>
                        {{ trans('cruds.terminalKasir.fields.gudang') }}
                    </th>
                    <th>
                        {{ trans('cruds.terminalKasir.fields.kas_kasir') }}
                    </th>
                    <th>
                        {{ trans('cruds.terminalKasir.fields.kas_setor') }}
                    </th>
                    <th>
                        {{ trans('cruds.terminalKasir.fields.aktif') }}
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
@can('terminal_kasir_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.terminal-kasirs.massDestroy') }}",
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
    ajax: "{{ route('admin.terminal-kasirs.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'kode_pos', name: 'kode_pos' },
{ data: 'nama', name: 'nama' },
{ data: 'cabang', name: 'cabang' },
{ data: 'gudang', name: 'gudang' },
{ data: 'kas_kasir', name: 'kas_kasir' },
{ data: 'kas_setor', name: 'kas_setor' },
{ data: 'aktif', name: 'aktif' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-TerminalKasir').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection