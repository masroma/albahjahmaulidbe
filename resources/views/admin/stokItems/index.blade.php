@extends('layouts.admin')
@section('content')
@can('stok_item_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.stok-items.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.stokItem.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.stokItem.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-StokItem">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.stokItem.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.stokItem.fields.item') }}
                    </th>
                    <th>
                        {{ trans('cruds.item.fields.item_nama') }}
                    </th>
                    <th>
                        {{ trans('cruds.stokItem.fields.location') }}
                    </th>
                    <th>
                        {{ trans('cruds.stokItem.fields.qty') }}
                    </th>
                    <th>
                        {{ trans('cruds.stokItem.fields.pid') }}
                    </th>
                    <th>
                        {{ trans('cruds.stokItem.fields.hpp') }}
                    </th>
                    <th>
                        {{ trans('cruds.stokItem.fields.min') }}
                    </th>
                    <th>
                        {{ trans('cruds.stokItem.fields.max') }}
                    </th>
                    <th>
                        {{ trans('cruds.stokItem.fields.re_order') }}
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
@can('stok_item_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.stok-items.massDestroy') }}",
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
    ajax: "{{ route('admin.stok-items.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'item_item_nama', name: 'item.item_nama' },
{ data: 'item.item_nama', name: 'item.item_nama' },
{ data: 'location', name: 'location' },
{ data: 'qty', name: 'qty' },
{ data: 'pid', name: 'pid' },
{ data: 'hpp', name: 'hpp' },
{ data: 'min', name: 'min' },
{ data: 'max', name: 'max' },
{ data: 're_order', name: 're_order' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-StokItem').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection