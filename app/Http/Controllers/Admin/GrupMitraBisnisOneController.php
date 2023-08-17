<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGrupMitraBisnisOneRequest;
use App\Http\Requests\StoreGrupMitraBisnisOneRequest;
use App\Http\Requests\UpdateGrupMitraBisnisOneRequest;
use App\Models\GrupMitraBisnisOne;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class GrupMitraBisnisOneController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('grup_mitra_bisnis_one_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = GrupMitraBisnisOne::query()->select(sprintf('%s.*', (new GrupMitraBisnisOne())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'grup_mitra_bisnis_one_show';
                $editGate = 'grup_mitra_bisnis_one_edit';
                $deleteGate = 'grup_mitra_bisnis_one_delete';
                $crudRoutePart = 'grup-mitra-bisnis-ones';

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
            $table->editColumn('keterangan', function ($row) {
                return $row->keterangan ? $row->keterangan : '';
            });
            $table->editColumn('level', function ($row) {
                return $row->level ? $row->level : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.grupMitraBisnisOnes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('grup_mitra_bisnis_one_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.grupMitraBisnisOnes.create');
    }

    public function store(StoreGrupMitraBisnisOneRequest $request)
    {
        $grupMitraBisnisOne = GrupMitraBisnisOne::create($request->all());

        return redirect()->route('admin.grup-mitra-bisnis-ones.index');
    }

    public function edit(GrupMitraBisnisOne $grupMitraBisnisOne)
    {
        abort_if(Gate::denies('grup_mitra_bisnis_one_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.grupMitraBisnisOnes.edit', compact('grupMitraBisnisOne'));
    }

    public function update(UpdateGrupMitraBisnisOneRequest $request, GrupMitraBisnisOne $grupMitraBisnisOne)
    {
        $grupMitraBisnisOne->update($request->all());

        return redirect()->route('admin.grup-mitra-bisnis-ones.index');
    }

    public function show(GrupMitraBisnisOne $grupMitraBisnisOne)
    {
        abort_if(Gate::denies('grup_mitra_bisnis_one_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.grupMitraBisnisOnes.show', compact('grupMitraBisnisOne'));
    }

    public function destroy(GrupMitraBisnisOne $grupMitraBisnisOne)
    {
        abort_if(Gate::denies('grup_mitra_bisnis_one_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $grupMitraBisnisOne->delete();

        return back();
    }

    public function massDestroy(MassDestroyGrupMitraBisnisOneRequest $request)
    {
        GrupMitraBisnisOne::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
