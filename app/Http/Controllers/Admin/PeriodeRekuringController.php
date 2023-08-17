<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPeriodeRekuringRequest;
use App\Http\Requests\StorePeriodeRekuringRequest;
use App\Http\Requests\UpdatePeriodeRekuringRequest;
use App\Models\PeriodeRekuring;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PeriodeRekuringController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('periode_rekuring_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = PeriodeRekuring::query()->select(sprintf('%s.*', (new PeriodeRekuring())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'periode_rekuring_show';
                $editGate = 'periode_rekuring_edit';
                $deleteGate = 'periode_rekuring_delete';
                $crudRoutePart = 'periode-rekurings';

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
            $table->editColumn('faktor_pengali', function ($row) {
                return $row->faktor_pengali ? PeriodeRekuring::FAKTOR_PENGALI_SELECT[$row->faktor_pengali] : '';
            });
            $table->editColumn('nilai_pengali', function ($row) {
                return $row->nilai_pengali ? $row->nilai_pengali : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.periodeRekurings.index');
    }

    public function create()
    {
        abort_if(Gate::denies('periode_rekuring_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.periodeRekurings.create');
    }

    public function store(StorePeriodeRekuringRequest $request)
    {
        $periodeRekuring = PeriodeRekuring::create($request->all());

        return redirect()->route('admin.periode-rekurings.index');
    }

    public function edit(PeriodeRekuring $periodeRekuring)
    {
        abort_if(Gate::denies('periode_rekuring_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.periodeRekurings.edit', compact('periodeRekuring'));
    }

    public function update(UpdatePeriodeRekuringRequest $request, PeriodeRekuring $periodeRekuring)
    {
        $periodeRekuring->update($request->all());

        return redirect()->route('admin.periode-rekurings.index');
    }

    public function show(PeriodeRekuring $periodeRekuring)
    {
        abort_if(Gate::denies('periode_rekuring_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.periodeRekurings.show', compact('periodeRekuring'));
    }

    public function destroy(PeriodeRekuring $periodeRekuring)
    {
        abort_if(Gate::denies('periode_rekuring_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $periodeRekuring->delete();

        return back();
    }

    public function massDestroy(MassDestroyPeriodeRekuringRequest $request)
    {
        PeriodeRekuring::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
