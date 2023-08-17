@extends('layouts.admin')
@section('content')
@can('mitra_bisni_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.mitra-bisnis.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.mitraBisni.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.mitraBisni.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-MitraBisni">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.mitraBisni.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.mitraBisni.fields.kode') }}
                    </th>
                    <th>
                        {{ trans('cruds.mitraBisni.fields.nama') }}
                    </th>
                    <th>
                        {{ trans('cruds.mitraBisni.fields.deskripsi') }}
                    </th>
                    <th>
                        {{ trans('cruds.mitraBisni.fields.aktif') }}
                    </th>
                    <th>
                        {{ trans('cruds.mitraBisni.fields.tipe_bisnis_customer') }}
                    </th>
                    <th>
                        {{ trans('cruds.mitraBisni.fields.tipe_bisnis_supplier') }}
                    </th>
                    <th>
                        {{ trans('cruds.mitraBisni.fields.group_1') }}
                    </th>
                    <th>
                        {{ trans('cruds.mitraBisni.fields.group_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.mitraBisni.fields.group_3') }}
                    </th>
                    <th>
                        {{ trans('cruds.mitraBisni.fields.level_harga') }}
                    </th>
                    <th>
                        {{ trans('cruds.mitraBisni.fields.sales') }}
                    </th>
                    <th>
                        {{ trans('cruds.mitraBisni.fields.bank') }}
                    </th>
                    <th>
                        {{ trans('cruds.mitraBisni.fields.no_rekening') }}
                    </th>
                    <th>
                        {{ trans('cruds.mitraBisni.fields.atas_nama') }}
                    </th>
                    <th>
                        {{ trans('cruds.mitraBisni.fields.npwp') }}
                    </th>
                    <th>
                        {{ trans('cruds.mitraBisni.fields.pkp') }}
                    </th>
                    <th>
                        {{ trans('cruds.mitraBisni.fields.tanggal_pkp') }}
                    </th>
                    <th>
                        {{ trans('cruds.mitraBisni.fields.no_nik') }}
                    </th>
                    <th>
                        {{ trans('cruds.mitraBisni.fields.atas_nama_nik') }}
                    </th>
                    <th>
                        {{ trans('cruds.mitraBisni.fields.pembelian_pajak') }}
                    </th>
                    <th>
                        {{ trans('cruds.mitraBisni.fields.penjualan_pajak') }}
                    </th>
                    <th>
                        {{ trans('cruds.mitraBisni.fields.image') }}
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
@can('mitra_bisni_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.mitra-bisnis.massDestroy') }}",
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
    ajax: "{{ route('admin.mitra-bisnis.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'kode', name: 'kode' },
{ data: 'nama', name: 'nama' },
{ data: 'deskripsi', name: 'deskripsi' },
{ data: 'aktif', name: 'aktif' },
{ data: 'tipe_bisnis_customer', name: 'tipe_bisnis_customer' },
{ data: 'tipe_bisnis_supplier', name: 'tipe_bisnis_supplier' },
{ data: 'group_1', name: 'group_1s.kode' },
{ data: 'group_2', name: 'group_2s.kode' },
{ data: 'group_3', name: 'group_3s.kode' },
{ data: 'level_harga', name: 'level_hargas.keterangan' },
{ data: 'sales', name: 'sales.nama' },
{ data: 'bank', name: 'bank' },
{ data: 'no_rekening', name: 'no_rekening' },
{ data: 'atas_nama', name: 'atas_nama' },
{ data: 'npwp', name: 'npwp' },
{ data: 'pkp', name: 'pkp' },
{ data: 'tanggal_pkp', name: 'tanggal_pkp' },
{ data: 'no_nik', name: 'no_nik' },
{ data: 'atas_nama_nik', name: 'atas_nama_nik' },
{ data: 'pembelian_pajak', name: 'pembelian_pajak' },
{ data: 'penjualan_pajak', name: 'penjualan_pajak' },
{ data: 'image', name: 'image', sortable: false, searchable: false },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-MitraBisni').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection