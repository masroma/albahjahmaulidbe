<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGrupMitraBisnisThreeRequest;
use App\Http\Requests\StoreGrupMitraBisnisThreeRequest;
use App\Http\Requests\UpdateGrupMitraBisnisThreeRequest;
use App\Models\GrupMitraBisnisThree;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class GrupMitraBisnisThreeController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('grup_mitra_bisnis_three_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = GrupMitraBisnisThree::query()->select(sprintf('%s.*', (new GrupMitraBisnisThree())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'grup_mitra_bisnis_three_show';
                $editGate = 'grup_mitra_bisnis_three_edit';
                $deleteGate = 'grup_mitra_bisnis_three_delete';
                $crudRoutePart = 'grup-mitra-bisnis-threes';

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

        return view('admin.grupMitraBisnisThrees.index');
    }

    public function create()
    {
        abort_if(Gate::denies('grup_mitra_bisnis_three_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.grupMitraBisnisThrees.create');
    }

    public function store(StoreGrupMitraBisnisThreeRequest $request)
    {
        $grupMitraBisnisThree = GrupMitraBisnisThree::create($request->all());

        return redirect()->route('admin.grup-mitra-bisnis-threes.index');
    }

    public function edit(GrupMitraBisnisThree $grupMitraBisnisThree)
    {
        abort_if(Gate::denies('grup_mitra_bisnis_three_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.grupMitraBisnisThrees.edit', compact('grupMitraBisnisThree'));
    }

    public function update(UpdateGrupMitraBisnisThreeRequest $request, GrupMitraBisnisThree $grupMitraBisnisThree)
    {
        $grupMitraBisnisThree->update($request->all());

        return redirect()->route('admin.grup-mitra-bisnis-threes.index');
    }

    public function show(GrupMitraBisnisThree $grupMitraBisnisThree)
    {
        abort_if(Gate::denies('grup_mitra_bisnis_three_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.grupMitraBisnisThrees.show', compact('grupMitraBisnisThree'));
    }

    public function destroy(GrupMitraBisnisThree $grupMitraBisnisThree)
    {
        abort_if(Gate::denies('grup_mitra_bisnis_three_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $grupMitraBisnisThree->delete();

        return back();
    }

    public function massDestroy(MassDestroyGrupMitraBisnisThreeRequest $request)
    {
        GrupMitraBisnisThree::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
