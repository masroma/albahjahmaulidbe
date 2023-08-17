@extends('layouts.admin')
@section('content')
@can('satuan_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.satuans.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.satuan.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.satuan.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Satuan">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.satuan.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.satuan.fields.satuan_1') }}
                    </th>
                    <th>
                        {{ trans('cruds.satuan.fields.satuan_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.satuan.fields.isi_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.satuan.fields.satuan_3') }}
                    </th>
                    <th>
                        {{ trans('cruds.satuan.fields.isi_3') }}
                    </th>
                    <th>
                        {{ trans('cruds.satuan.fields.satuan_pembelian') }}
                    </th>
                    <th>
                        {{ trans('cruds.satuan.fields.satuan_penjualan') }}
                    </th>
                    <th>
                        {{ trans('cruds.satuan.fields.satuan_stok') }}
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
@can('satuan_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.satuans.massDestroy') }}",
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
    ajax: "{{ route('admin.satuans.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'satuan_1', name: 'satuan_1' },
{ data: 'satuan_2', name: 'satuan_2' },
{ data: 'isi_2', name: 'isi_2' },
{ data: 'satuan_3', name: 'satuan_3' },
{ data: 'isi_3', name: 'isi_3' },
{ data: 'satuan_pembelian', name: 'satuan_pembelian' },
{ data: 'satuan_penjualan', name: 'satuan_penjualan' },
{ data: 'satuan_stok', name: 'satuan_stok' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Satuan').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection