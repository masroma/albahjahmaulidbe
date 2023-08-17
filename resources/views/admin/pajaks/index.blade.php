@extends('layouts.admin')
@section('content')
@can('pajak_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.pajaks.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.pajak.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.pajak.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Pajak">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.pajak.fields.kode') }}
                    </th>
                    <th>
                        {{ trans('cruds.pajak.fields.nama_pajak') }}
                    </th>
                    <th>
                        {{ trans('cruds.pajak.fields.akun_pembelian') }}
                    </th>
                    <th>
                        {{ trans('cruds.pajak.fields.akun_penjualan') }}
                    </th>
                    <th>
                        {{ trans('cruds.pajak.fields.presentasi_npwp') }}
                    </th>
                    <th>
                        {{ trans('cruds.pajak.fields.presentasi_non_npwp') }}
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
@can('pajak_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.pajaks.massDestroy') }}",
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
    ajax: "{{ route('admin.pajaks.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'kode', name: 'kode' },
{ data: 'nama_pajak', name: 'nama_pajak' },
{ data: 'akun_pembelian_akun_kode', name: 'akun_pembelian.akun_kode' },
{ data: 'akun_penjualan_akun_kode', name: 'akun_penjualan.akun_kode' },
{ data: 'presentasi_npwp', name: 'presentasi_npwp' },
{ data: 'presentasi_non_npwp', name: 'presentasi_non_npwp' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  };
  let table = $('.datatable-Pajak').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection