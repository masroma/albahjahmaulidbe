@extends('layouts.admin')
@section('content')
@can('kas_bank_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.kas-banks.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.kasBank.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.kasBank.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-KasBank">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.kasBank.fields.kode') }}
                    </th>
                    <th>
                        {{ trans('cruds.kasBank.fields.tipe_kas') }}
                    </th>
                    <th>
                        {{ trans('cruds.kasBank.fields.akun') }}
                    </th>
                    <th>
                        {{ trans('cruds.kasBank.fields.nama') }}
                    </th>
                    <th>
                        {{ trans('cruds.kasBank.fields.mata_uang') }}
                    </th>
                    <th>
                        {{ trans('cruds.kasBank.fields.saldo') }}
                    </th>
                    <th>
                        {{ trans('cruds.kasBank.fields.tot_giro_keluar') }}
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
@can('kas_bank_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.kas-banks.massDestroy') }}",
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
    ajax: "{{ route('admin.kas-banks.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'kode', name: 'kode' },
{ data: 'tipe_kas', name: 'tipe_kas' },
{ data: 'akun', name: 'akun' },
{ data: 'nama', name: 'nama' },
{ data: 'mata_uang', name: 'mata_uang' },
{ data: 'saldo', name: 'saldo' },
{ data: 'tot_giro_keluar', name: 'tot_giro_keluar' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  };
  let table = $('.datatable-KasBank').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection