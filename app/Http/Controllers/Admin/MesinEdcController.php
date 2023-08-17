<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMesinEdcRequest;
use App\Http\Requests\StoreMesinEdcRequest;
use App\Http\Requests\UpdateMesinEdcRequest;
use App\Models\MesinEdc;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MesinEdcController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('mesin_edc_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = MesinEdc::query()->select(sprintf('%s.*', (new MesinEdc())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'mesin_edc_show';
                $editGate = 'mesin_edc_edit';
                $deleteGate = 'mesin_edc_delete';
                $crudRoutePart = 'mesin-edcs';

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
            $table->editColumn('kode_edc', function ($row) {
                return $row->kode_edc ? $row->kode_edc : '';
            });
            $table->editColumn('nama_edc', function ($row) {
                return $row->nama_edc ? $row->nama_edc : '';
            });
            $table->editColumn('bank', function ($row) {
                return $row->bank ? MesinEdc::BANK_SELECT[$row->bank] : '';
            });
            $table->editColumn('cabang', function ($row) {
                return $row->cabang ? MesinEdc::CABANG_SELECT[$row->cabang] : '';
            });
            $table->editColumn('keterangan', function ($row) {
                return $row->keterangan ? $row->keterangan : '';
            });
            $table->editColumn('aktif', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->aktif ? 'checked' : null) . '>';
            });

            $table->rawColumns(['actions', 'placeholder', 'aktif']);

            return $table->make(true);
        }

        return view('admin.mesinEdcs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('mesin_edc_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mesinEdcs.create');
    }

    public function store(StoreMesinEdcRequest $request)
    {
        $mesinEdc = MesinEdc::create($request->all());

        return redirect()->route('admin.mesin-edcs.index');
    }

    public function edit(MesinEdc $mesinEdc)
    {
        abort_if(Gate::denies('mesin_edc_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mesinEdcs.edit', compact('mesinEdc'));
    }

    public function update(UpdateMesinEdcRequest $request, MesinEdc $mesinEdc)
    {
        $mesinEdc->update($request->all());

        return redirect()->route('admin.mesin-edcs.index');
    }

    public function show(MesinEdc $mesinEdc)
    {
        abort_if(Gate::denies('mesin_edc_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mesinEdcs.show', compact('mesinEdc'));
    }

    public function destroy(MesinEdc $mesinEdc)
    {
        abort_if(Gate::denies('mesin_edc_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mesinEdc->delete();

        return back();
    }

    public function massDestroy(MassDestroyMesinEdcRequest $request)
    {
        MesinEdc::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
