<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProyekRequest;
use App\Http\Requests\StoreProyekRequest;
use App\Http\Requests\UpdateProyekRequest;
use App\Models\GrupMitraBisnisOne;
use App\Models\Pegawai;
use App\Models\Proyek;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProyekController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('proyek_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Proyek::with(['pegawai', 'mitra_bisnis'])->select(sprintf('%s.*', (new Proyek())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'proyek_show';
                $editGate = 'proyek_edit';
                $deleteGate = 'proyek_delete';
                $crudRoutePart = 'proyeks';

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
            $table->editColumn('nama', function ($row) {
                return $row->nama ? $row->nama : '';
            });
            $table->addColumn('pegawai_nama', function ($row) {
                return $row->pegawai ? $row->pegawai->nama : '';
            });

            $table->editColumn('pegawai.nama', function ($row) {
                return $row->pegawai ? (is_string($row->pegawai) ? $row->pegawai : $row->pegawai->nama) : '';
            });
            $table->addColumn('mitra_bisnis_kode', function ($row) {
                return $row->mitra_bisnis ? $row->mitra_bisnis->kode : '';
            });

            $table->editColumn('mitra_bisnis.keterangan', function ($row) {
                return $row->mitra_bisnis ? (is_string($row->mitra_bisnis) ? $row->mitra_bisnis : $row->mitra_bisnis->keterangan) : '';
            });
            $table->editColumn('status', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->status ? 'checked' : null) . '>';
            });

            $table->rawColumns(['actions', 'placeholder', 'pegawai', 'mitra_bisnis', 'status']);

            return $table->make(true);
        }

        return view('admin.proyeks.index');
    }

    public function create()
    {
        abort_if(Gate::denies('proyek_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pegawais = Pegawai::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $mitra_bisnis = GrupMitraBisnisOne::pluck('kode', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.proyeks.create', compact('mitra_bisnis', 'pegawais'));
    }

    public function store(StoreProyekRequest $request)
    {
        $proyek = Proyek::create($request->all());

        return redirect()->route('admin.proyeks.index');
    }

    public function edit(Proyek $proyek)
    {
        abort_if(Gate::denies('proyek_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pegawais = Pegawai::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $mitra_bisnis = GrupMitraBisnisOne::pluck('kode', 'id')->prepend(trans('global.pleaseSelect'), '');

        $proyek->load('pegawai', 'mitra_bisnis');

        return view('admin.proyeks.edit', compact('mitra_bisnis', 'pegawais', 'proyek'));
    }

    public function update(UpdateProyekRequest $request, Proyek $proyek)
    {
        $proyek->update($request->all());

        return redirect()->route('admin.proyeks.index');
    }

    public function show(Proyek $proyek)
    {
        abort_if(Gate::denies('proyek_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $proyek->load('pegawai', 'mitra_bisnis');

        return view('admin.proyeks.show', compact('proyek'));
    }

    public function destroy(Proyek $proyek)
    {
        abort_if(Gate::denies('proyek_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $proyek->delete();

        return back();
    }

    public function massDestroy(MassDestroyProyekRequest $request)
    {
        Proyek::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
