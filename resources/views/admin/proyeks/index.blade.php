@extends('layouts.admin')
@section('content')
@can('proyek_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.proyeks.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.proyek.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.proyek.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Proyek">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.proyek.fields.kode') }}
                    </th>
                    <th>
                        {{ trans('cruds.proyek.fields.nama') }}
                    </th>
                    <th>
                        {{ trans('cruds.proyek.fields.pegawai') }}
                    </th>
                    <th>
                        {{ trans('cruds.pegawai.fields.nama') }}
                    </th>
                    <th>
                        {{ trans('cruds.proyek.fields.mitra_bisnis') }}
                    </th>
                    <th>
                        {{ trans('cruds.grupMitraBisnisOne.fields.keterangan') }}
                    </th>
                    <th>
                        {{ trans('cruds.proyek.fields.status') }}
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
@can('proyek_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.proyeks.massDestroy') }}",
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
    ajax: "{{ route('admin.proyeks.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'kode', name: 'kode' },
{ data: 'nama', name: 'nama' },
{ data: 'pegawai_nama', name: 'pegawai.nama' },
{ data: 'pegawai.nama', name: 'pegawai.nama' },
{ data: 'mitra_bisnis_kode', name: 'mitra_bisnis.kode' },
{ data: 'mitra_bisnis.keterangan', name: 'mitra_bisnis.keterangan' },
{ data: 'status', name: 'status' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  };
  let table = $('.datatable-Proyek').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection