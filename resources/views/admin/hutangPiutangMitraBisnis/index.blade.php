@extends('layouts.admin')
@section('content')
@can('hutang_piutang_mitra_bisni_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.hutang-piutang-mitra-bisnis.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.hutangPiutangMitraBisni.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.hutangPiutangMitraBisni.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-HutangPiutangMitraBisni">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.hutangPiutangMitraBisni.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.hutangPiutangMitraBisni.fields.mitra_bisnis') }}
                    </th>
                    <th>
                        {{ trans('cruds.hutangPiutangMitraBisni.fields.mata_uang') }}
                    </th>
                    <th>
                        {{ trans('cruds.hutangPiutangMitraBisni.fields.pembelian_termin') }}
                    </th>
                    <th>
                        {{ trans('cruds.hutangPiutangMitraBisni.fields.pembelian_tempo') }}
                    </th>
                    <th>
                        {{ trans('cruds.hutangPiutangMitraBisni.fields.penjualan_termin') }}
                    </th>
                    <th>
                        {{ trans('cruds.hutangPiutangMitraBisni.fields.penjualan_tempo') }}
                    </th>
                    <th>
                        {{ trans('cruds.hutangPiutangMitraBisni.fields.batas_hutang') }}
                    </th>
                    <th>
                        {{ trans('cruds.hutangPiutangMitraBisni.fields.batas_frekuensi_hutang') }}
                    </th>
                    <th>
                        {{ trans('cruds.hutangPiutangMitraBisni.fields.akun_hutang') }}
                    </th>
                    <th>
                        {{ trans('cruds.hutangPiutangMitraBisni.fields.batas_piutang') }}
                    </th>
                    <th>
                        {{ trans('cruds.hutangPiutangMitraBisni.fields.batas_frekuensi_piutang') }}
                    </th>
                    <th>
                        {{ trans('cruds.hutangPiutangMitraBisni.fields.akun_stakeholder_piutang') }}
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
@can('hutang_piutang_mitra_bisni_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.hutang-piutang-mitra-bisnis.massDestroy') }}",
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
    ajax: "{{ route('admin.hutang-piutang-mitra-bisnis.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'mitra_bisnis', name: 'mitra_bisnis.nama' },
{ data: 'mata_uang', name: 'mata_uangs.mata_uang' },
{ data: 'pembelian_termin', name: 'pembelian_termin' },
{ data: 'pembelian_tempo', name: 'pembelian_tempo' },
{ data: 'penjualan_termin', name: 'penjualan_termin' },
{ data: 'penjualan_tempo', name: 'penjualan_tempo' },
{ data: 'batas_hutang', name: 'batas_hutang' },
{ data: 'batas_frekuensi_hutang', name: 'batas_frekuensi_hutang' },
{ data: 'akun_hutang', name: 'akun_hutangs.akun_nama' },
{ data: 'batas_piutang', name: 'batas_piutang' },
{ data: 'batas_frekuensi_piutang', name: 'batas_frekuensi_piutang' },
{ data: 'akun_stakeholder_piutang', name: 'akun_stakeholder_piutangs.nama' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-HutangPiutangMitraBisni').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection