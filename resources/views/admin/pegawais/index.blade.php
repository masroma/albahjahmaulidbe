@extends('layouts.admin')
@section('content')
@can('pegawai_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.pegawais.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.pegawai.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.pegawai.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Pegawai">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.pegawai.fields.kode') }}
                    </th>
                    <th>
                        {{ trans('cruds.pegawai.fields.nama') }}
                    </th>
                    <th>
                        {{ trans('cruds.pegawai.fields.alamat') }}
                    </th>
                    <th>
                        {{ trans('cruds.pegawai.fields.kode_kota') }}
                    </th>
                    <th>
                        {{ trans('cruds.kotum.fields.nama') }}
                    </th>
                    <th>
                        {{ trans('cruds.pegawai.fields.handphone') }}
                    </th>
                    <th>
                        {{ trans('cruds.pegawai.fields.aktif') }}
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
@can('pegawai_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.pegawais.massDestroy') }}",
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
    ajax: "{{ route('admin.pegawais.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'kode', name: 'kode' },
{ data: 'nama', name: 'nama' },
{ data: 'alamat', name: 'alamat' },
{ data: 'kode_kota_nama', name: 'kode_kota.nama' },
{ data: 'kode_kota.nama', name: 'kode_kota.nama' },
{ data: 'handphone', name: 'handphone' },
{ data: 'aktif', name: 'aktif' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  };
  let table = $('.datatable-Pegawai').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection