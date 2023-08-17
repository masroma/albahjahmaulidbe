<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPabrikRequest;
use App\Http\Requests\StorePabrikRequest;
use App\Http\Requests\UpdatePabrikRequest;
use App\Models\Pabrik;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PabrikController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('pabrik_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Pabrik::query()->select(sprintf('%s.*', (new Pabrik())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'pabrik_show';
                $editGate = 'pabrik_edit';
                $deleteGate = 'pabrik_delete';
                $crudRoutePart = 'pabriks';

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
            $table->editColumn('nama_pabrik', function ($row) {
                return $row->nama_pabrik ? $row->nama_pabrik : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.pabriks.index');
    }

    public function create()
    {
        abort_if(Gate::denies('pabrik_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pabriks.create');
    }

    public function store(StorePabrikRequest $request)
    {
        $pabrik = Pabrik::create($request->all());

        return redirect()->route('admin.pabriks.index');
    }

    public function edit(Pabrik $pabrik)
    {
        abort_if(Gate::denies('pabrik_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pabriks.edit', compact('pabrik'));
    }

    public function update(UpdatePabrikRequest $request, Pabrik $pabrik)
    {
        $pabrik->update($request->all());

        return redirect()->route('admin.pabriks.index');
    }

    public function show(Pabrik $pabrik)
    {
        abort_if(Gate::denies('pabrik_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pabriks.show', compact('pabrik'));
    }

    public function destroy(Pabrik $pabrik)
    {
        abort_if(Gate::denies('pabrik_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pabrik->delete();

        return back();
    }

    public function massDestroy(MassDestroyPabrikRequest $request)
    {
        Pabrik::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
