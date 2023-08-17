@extends('layouts.admin')
@section('content')
@can('alamat_mitra_bisni_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.alamat-mitra-bisnis.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.alamatMitraBisni.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.alamatMitraBisni.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-AlamatMitraBisni">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.alamatMitraBisni.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.alamatMitraBisni.fields.mitra_bisnis') }}
                    </th>
                    <th>
                        {{ trans('cruds.alamatMitraBisni.fields.keterangan_alamat') }}
                    </th>
                    <th>
                        {{ trans('cruds.alamatMitraBisni.fields.alamat_lengkap') }}
                    </th>
                    <th>
                        {{ trans('cruds.alamatMitraBisni.fields.kota') }}
                    </th>
                    <th>
                        {{ trans('cruds.alamatMitraBisni.fields.telepon') }}
                    </th>
                    <th>
                        {{ trans('cruds.alamatMitraBisni.fields.fax') }}
                    </th>
                    <th>
                        {{ trans('cruds.alamatMitraBisni.fields.kode_pos') }}
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
@can('alamat_mitra_bisni_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.alamat-mitra-bisnis.massDestroy') }}",
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
    ajax: "{{ route('admin.alamat-mitra-bisnis.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'mitra_bisnis', name: 'mitra_bisnis.nama' },
{ data: 'keterangan_alamat', name: 'keterangan_alamat' },
{ data: 'alamat_lengkap', name: 'alamat_lengkap' },
{ data: 'kota', name: 'kotas.nama' },
{ data: 'telepon', name: 'telepon' },
{ data: 'fax', name: 'fax' },
{ data: 'kode_pos', name: 'kode_pos' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-AlamatMitraBisni').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection