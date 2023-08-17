<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyKotumRequest;
use App\Http\Requests\StoreKotumRequest;
use App\Http\Requests\UpdateKotumRequest;
use App\Models\Kotum;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class KotaController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('kotum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Kotum::query()->select(sprintf('%s.*', (new Kotum())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'kotum_show';
                $editGate = 'kotum_edit';
                $deleteGate = 'kotum_delete';
                $crudRoutePart = 'kota';

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
            $table->editColumn('nama', function ($row) {
                return $row->nama ? $row->nama : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.kota.index');
    }

    public function create()
    {
        abort_if(Gate::denies('kotum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kota.create');
    }

    public function store(StoreKotumRequest $request)
    {
        $kotum = Kotum::create($request->all());

        return redirect()->route('admin.kota.index');
    }

    public function edit(Kotum $kotum)
    {
        abort_if(Gate::denies('kotum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kota.edit', compact('kotum'));
    }

    public function update(UpdateKotumRequest $request, Kotum $kotum)
    {
        $kotum->update($request->all());

        return redirect()->route('admin.kota.index');
    }

    public function show(Kotum $kotum)
    {
        abort_if(Gate::denies('kotum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kota.show', compact('kotum'));
    }

    public function destroy(Kotum $kotum)
    {
        abort_if(Gate::denies('kotum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kotum->delete();

        return back();
    }

    public function massDestroy(MassDestroyKotumRequest $request)
    {
        Kotum::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
