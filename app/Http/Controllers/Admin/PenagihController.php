<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPenagihRequest;
use App\Http\Requests\StorePenagihRequest;
use App\Http\Requests\UpdatePenagihRequest;
use App\Models\Kotum;
use App\Models\Penagih;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PenagihController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('penagih_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Penagih::with(['kode_kota'])->select(sprintf('%s.*', (new Penagih())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'penagih_show';
                $editGate = 'penagih_edit';
                $deleteGate = 'penagih_delete';
                $crudRoutePart = 'penagihs';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('kode', function ($row) {
                return $row->kode ? $row->kode : '';
            });
            $table->editColumn('nama_penagih', function ($row) {
                return $row->nama_penagih ? $row->nama_penagih : '';
            });
            $table->editColumn('alamat', function ($row) {
                return $row->alamat ? $row->alamat : '';
            });
            $table->addColumn('kode_kota_nama', function ($row) {
                return $row->kode_kota ? $row->kode_kota->nama : '';
            });

            $table->editColumn('handphone', function ($row) {
                return $row->handphone ? $row->handphone : '';
            });
            $table->editColumn('aktif', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->aktif ? 'checked' : null) . '>';
            });

            $table->rawColumns(['actions', 'placeholder', 'kode_kota', 'aktif']);

            return $table->make(true);
        }

        return view('admin.penagihs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('penagih_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kode_kotas = Kotum::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.penagihs.create', compact('kode_kotas'));
    }

    public function store(StorePenagihRequest $request)
    {
        $penagih = Penagih::create($request->all());

        return redirect()->route('admin.penagihs.index');
    }

    public function edit(Penagih $penagih)
    {
        abort_if(Gate::denies('penagih_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kode_kotas = Kotum::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $penagih->load('kode_kota');

        return view('admin.penagihs.edit', compact('kode_kotas', 'penagih'));
    }

    public function update(UpdatePenagihRequest $request, Penagih $penagih)
    {
        $penagih->update($request->all());

        return redirect()->route('admin.penagihs.index');
    }

    public function show(Penagih $penagih)
    {
        abort_if(Gate::denies('penagih_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $penagih->load('kode_kota');

        return view('admin.penagihs.show', compact('penagih'));
    }

    public function destroy(Penagih $penagih)
    {
        abort_if(Gate::denies('penagih_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $penagih->delete();

        return back();
    }

    public function massDestroy(MassDestroyPenagihRequest $request)
    {
        Penagih::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
