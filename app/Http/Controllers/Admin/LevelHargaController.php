<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLevelHargaRequest;
use App\Http\Requests\StoreLevelHargaRequest;
use App\Http\Requests\UpdateLevelHargaRequest;
use App\Models\LevelHarga;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class LevelHargaController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('level_harga_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = LevelHarga::query()->select(sprintf('%s.*', (new LevelHarga())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'level_harga_show';
                $editGate = 'level_harga_edit';
                $deleteGate = 'level_harga_delete';
                $crudRoutePart = 'level-hargas';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('code', function ($row) {
                return $row->code ? $row->code : '';
            });
            $table->editColumn('keterangan', function ($row) {
                return $row->keterangan ? $row->keterangan : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.levelHargas.index');
    }

    public function create()
    {
        abort_if(Gate::denies('level_harga_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.levelHargas.create');
    }

    public function store(StoreLevelHargaRequest $request)
    {
        $levelHarga = LevelHarga::create($request->all());

        return redirect()->route('admin.level-hargas.index');
    }

    public function edit(LevelHarga $levelHarga)
    {
        abort_if(Gate::denies('level_harga_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.levelHargas.edit', compact('levelHarga'));
    }

    public function update(UpdateLevelHargaRequest $request, LevelHarga $levelHarga)
    {
        $levelHarga->update($request->all());

        return redirect()->route('admin.level-hargas.index');
    }

    public function show(LevelHarga $levelHarga)
    {
        abort_if(Gate::denies('level_harga_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.levelHargas.show', compact('levelHarga'));
    }

    public function destroy(LevelHarga $levelHarga)
    {
        abort_if(Gate::denies('level_harga_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $levelHarga->delete();

        return back();
    }

    public function massDestroy(MassDestroyLevelHargaRequest $request)
    {
        LevelHarga::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
