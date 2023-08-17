<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGudangRequest;
use App\Http\Requests\StoreGudangRequest;
use App\Http\Requests\UpdateGudangRequest;
use App\Models\Gudang;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class GudangController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('gudang_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Gudang::query()->select(sprintf('%s.*', (new Gudang)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'gudang_show';
                $editGate      = 'gudang_edit';
                $deleteGate    = 'gudang_delete';
                $crudRoutePart = 'gudangs';

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
            $table->editColumn('code', function ($row) {
                return $row->code ? $row->code : '';
            });
            $table->editColumn('nama', function ($row) {
                return $row->nama ? $row->nama : '';
            });
            $table->editColumn('active', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->active ? 'checked' : null) . '>';
            });

            $table->rawColumns(['actions', 'placeholder', 'active']);

            return $table->make(true);
        }

        return view('admin.gudangs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('gudang_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.gudangs.create');
    }

    public function store(StoreGudangRequest $request)
    {
        $gudang = Gudang::create($request->all());

        return redirect()->route('admin.gudangs.index');
    }

    public function edit(Gudang $gudang)
    {
        abort_if(Gate::denies('gudang_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.gudangs.edit', compact('gudang'));
    }

    public function update(UpdateGudangRequest $request, Gudang $gudang)
    {
        $gudang->update($request->all());

        return redirect()->route('admin.gudangs.index');
    }

    public function show(Gudang $gudang)
    {
        abort_if(Gate::denies('gudang_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.gudangs.show', compact('gudang'));
    }

    public function destroy(Gudang $gudang)
    {
        abort_if(Gate::denies('gudang_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gudang->delete();

        return back();
    }

    public function massDestroy(MassDestroyGudangRequest $request)
    {
        $gudangs = Gudang::find(request('ids'));

        foreach ($gudangs as $gudang) {
            $gudang->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
