@extends('layouts.admin')
@section('content')
@can('harga_jual_item_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.harga-jual-items.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.hargaJualItem.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.hargaJualItem.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-HargaJualItem">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.hargaJualItem.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.hargaJualItem.fields.item') }}
                    </th>
                    <th>
                        {{ trans('cruds.hargaJualItem.fields.level_harga') }}
                    </th>
                    <th>
                        {{ trans('cruds.hargaJualItem.fields.mata_uang') }}
                    </th>
                    <th>
                        {{ trans('cruds.hargaJualItem.fields.harga_satuan_1') }}
                    </th>
                    <th>
                        {{ trans('cruds.hargaJualItem.fields.diskon_satuan_1') }}
                    </th>
                    <th>
                        {{ trans('cruds.hargaJualItem.fields.harga_satuan_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.hargaJualItem.fields.diskon_satuan_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.hargaJualItem.fields.harga_satuan_3') }}
                    </th>
                    <th>
                        {{ trans('cruds.hargaJualItem.fields.diskon_satuan_3') }}
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
@can('harga_jual_item_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.harga-jual-items.massDestroy') }}",
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
    ajax: "{{ route('admin.harga-jual-items.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'item_item_nama', name: 'item.item_nama' },
{ data: 'level_harga_keterangan', name: 'level_harga.keterangan' },
{ data: 'mata_uang_mata_uang', name: 'mata_uang.mata_uang' },
{ data: 'harga_satuan_1', name: 'harga_satuan_1' },
{ data: 'diskon_satuan_1', name: 'diskon_satuan_1' },
{ data: 'harga_satuan_2', name: 'harga_satuan_2' },
{ data: 'diskon_satuan_2', name: 'diskon_satuan_2' },
{ data: 'harga_satuan_3', name: 'harga_satuan_3' },
{ data: 'diskon_satuan_3', name: 'diskon_satuan_3' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-HargaJualItem').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection