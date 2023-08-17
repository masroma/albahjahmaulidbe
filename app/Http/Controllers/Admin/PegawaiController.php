<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPegawaiRequest;
use App\Http\Requests\StorePegawaiRequest;
use App\Http\Requests\UpdatePegawaiRequest;
use App\Models\Kotum;
use App\Models\Pegawai;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PegawaiController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('pegawai_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Pegawai::with(['kode_kota'])->select(sprintf('%s.*', (new Pegawai)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'pegawai_show';
                $editGate      = 'pegawai_edit';
                $deleteGate    = 'pegawai_delete';
                $crudRoutePart = 'pegawais';

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
            $table->editColumn('alamat', function ($row) {
                return $row->alamat ? $row->alamat : '';
            });
            $table->addColumn('kode_kota_nama', function ($row) {
                return $row->kode_kota ? $row->kode_kota->nama : '';
            });

            $table->editColumn('kode_kota.nama', function ($row) {
                return $row->kode_kota ? (is_string($row->kode_kota) ? $row->kode_kota : $row->kode_kota->nama) : '';
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

        return view('admin.pegawais.index');
    }

    public function create()
    {
        abort_if(Gate::denies('pegawai_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kode_kotas = Kotum::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.pegawais.create', compact('kode_kotas'));
    }

    public function store(StorePegawaiRequest $request)
    {
        $pegawai = Pegawai::create($request->all());

        return redirect()->route('admin.pegawais.index');
    }

    public function edit(Pegawai $pegawai)
    {
        abort_if(Gate::denies('pegawai_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kode_kotas = Kotum::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pegawai->load('kode_kota');

        return view('admin.pegawais.edit', compact('kode_kotas', 'pegawai'));
    }

    public function update(UpdatePegawaiRequest $request, Pegawai $pegawai)
    {
        $pegawai->update($request->all());

        return redirect()->route('admin.pegawais.index');
    }

    public function show(Pegawai $pegawai)
    {
        abort_if(Gate::denies('pegawai_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pegawai->load('kode_kota');

        return view('admin.pegawais.show', compact('pegawai'));
    }

    public function destroy(Pegawai $pegawai)
    {
        abort_if(Gate::denies('pegawai_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pegawai->delete();

        return back();
    }

    public function massDestroy(MassDestroyPegawaiRequest $request)
    {
        $pegawais = Pegawai::find(request('ids'));

        foreach ($pegawais as $pegawai) {
            $pegawai->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
