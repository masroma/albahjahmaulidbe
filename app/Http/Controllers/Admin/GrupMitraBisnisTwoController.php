<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGrupMitraBisnisTwoRequest;
use App\Http\Requests\StoreGrupMitraBisnisTwoRequest;
use App\Http\Requests\UpdateGrupMitraBisnisTwoRequest;
use App\Models\GrupMitraBisnisTwo;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class GrupMitraBisnisTwoController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('grup_mitra_bisnis_two_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = GrupMitraBisnisTwo::query()->select(sprintf('%s.*', (new GrupMitraBisnisTwo())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'grup_mitra_bisnis_two_show';
                $editGate = 'grup_mitra_bisnis_two_edit';
                $deleteGate = 'grup_mitra_bisnis_two_delete';
                $crudRoutePart = 'grup-mitra-bisnis-twos';

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

        return view('admin.grupMitraBisnisTwos.index');
    }

    public function create()
    {
        abort_if(Gate::denies('grup_mitra_bisnis_two_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.grupMitraBisnisTwos.create');
    }

    public function store(StoreGrupMitraBisnisTwoRequest $request)
    {
        $grupMitraBisnisTwo = GrupMitraBisnisTwo::create($request->all());

        return redirect()->route('admin.grup-mitra-bisnis-twos.index');
    }

    public function edit(GrupMitraBisnisTwo $grupMitraBisnisTwo)
    {
        abort_if(Gate::denies('grup_mitra_bisnis_two_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.grupMitraBisnisTwos.edit', compact('grupMitraBisnisTwo'));
    }

    public function update(UpdateGrupMitraBisnisTwoRequest $request, GrupMitraBisnisTwo $grupMitraBisnisTwo)
    {
        $grupMitraBisnisTwo->update($request->all());

        return redirect()->route('admin.grup-mitra-bisnis-twos.index');
    }

    public function show(GrupMitraBisnisTwo $grupMitraBisnisTwo)
    {
        abort_if(Gate::denies('grup_mitra_bisnis_two_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.grupMitraBisnisTwos.show', compact('grupMitraBisnisTwo'));
    }

    public function destroy(GrupMitraBisnisTwo $grupMitraBisnisTwo)
    {
        abort_if(Gate::denies('grup_mitra_bisnis_two_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $grupMitraBisnisTwo->delete();

        return back();
    }

    public function massDestroy(MassDestroyGrupMitraBisnisTwoRequest $request)
    {
        GrupMitraBisnisTwo::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
