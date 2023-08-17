<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPesertumRequest;
use App\Http\Requests\StorePesertumRequest;
use App\Http\Requests\UpdatePesertumRequest;
use App\Models\Pesertum;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PesertaController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('pesertum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Pesertum::query()->select(sprintf('%s.*', (new Pesertum)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'pesertum_show';
                $editGate      = 'pesertum_edit';
                $deleteGate    = 'pesertum_delete';
                $crudRoutePart = 'peserta';

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
            $table->editColumn('nama', function ($row) {
                return $row->nama ? $row->nama : '';
            });
            $table->editColumn('whatsapp', function ($row) {
                return $row->whatsapp ? $row->whatsapp : '';
            });
            $table->editColumn('alamat', function ($row) {
                return $row->alamat ? $row->alamat : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.peserta.index');
    }

    public function create()
    {
        abort_if(Gate::denies('pesertum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.peserta.create');
    }

    public function store(StorePesertumRequest $request)
    {
        $pesertum = Pesertum::create($request->all());

        return redirect()->route('admin.peserta.index');
    }

    public function edit(Pesertum $pesertum)
    {
        abort_if(Gate::denies('pesertum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.peserta.edit', compact('pesertum'));
    }

    public function update(UpdatePesertumRequest $request, Pesertum $pesertum)
    {
        $pesertum->update($request->all());

        return redirect()->route('admin.peserta.index');
    }

    public function destroy(Pesertum $pesertum)
    {
        abort_if(Gate::denies('pesertum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pesertum->delete();

        return back();
    }

    public function massDestroy(MassDestroyPesertumRequest $request)
    {
        $peserta = Pesertum::find(request('ids'));

        foreach ($peserta as $pesertum) {
            $pesertum->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
