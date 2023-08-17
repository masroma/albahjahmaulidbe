<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySatuanRequest;
use App\Http\Requests\StoreSatuanRequest;
use App\Http\Requests\UpdateSatuanRequest;
use App\Models\Satuan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SatuanController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('satuan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Satuan::query()->select(sprintf('%s.*', (new Satuan())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'satuan_show';
                $editGate = 'satuan_edit';
                $deleteGate = 'satuan_delete';
                $crudRoutePart = 'satuans';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('satuan_1', function ($row) {
                return $row->satuan_1 ? $row->satuan_1 : '';
            });
            $table->editColumn('satuan_2', function ($row) {
                return $row->satuan_2 ? $row->satuan_2 : '';
            });
            $table->editColumn('isi_2', function ($row) {
                return $row->isi_2 ? $row->isi_2 : '';
            });
            $table->editColumn('satuan_3', function ($row) {
                return $row->satuan_3 ? $row->satuan_3 : '';
            });
            $table->editColumn('isi_3', function ($row) {
                return $row->isi_3 ? $row->isi_3 : '';
            });
            $table->editColumn('satuan_pembelian', function ($row) {
                return $row->satuan_pembelian ? $row->satuan_pembelian : '';
            });
            $table->editColumn('satuan_penjualan', function ($row) {
                return $row->satuan_penjualan ? $row->satuan_penjualan : '';
            });
            $table->editColumn('satuan_stok', function ($row) {
                return $row->satuan_stok ? $row->satuan_stok : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.satuans.index');
    }

    public function create()
    {
        abort_if(Gate::denies('satuan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.satuans.create');
    }

    public function store(StoreSatuanRequest $request)
    {
        $satuan = Satuan::create($request->all());

        return redirect()->route('admin.satuans.index');
    }

    public function edit(Satuan $satuan)
    {
        abort_if(Gate::denies('satuan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.satuans.edit', compact('satuan'));
    }

    public function update(UpdateSatuanRequest $request, Satuan $satuan)
    {
        $satuan->update($request->all());

        return redirect()->route('admin.satuans.index');
    }

    public function show(Satuan $satuan)
    {
        abort_if(Gate::denies('satuan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.satuans.show', compact('satuan'));
    }

    public function destroy(Satuan $satuan)
    {
        abort_if(Gate::denies('satuan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $satuan->delete();

        return back();
    }

    public function massDestroy(MassDestroySatuanRequest $request)
    {
        Satuan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
