<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMataUangRequest;
use App\Http\Requests\StoreMataUangRequest;
use App\Http\Requests\UpdateMataUangRequest;
use App\Models\MataUang;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MataUangController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('mata_uang_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = MataUang::query()->select(sprintf('%s.*', (new MataUang)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'mata_uang_show';
                $editGate      = 'mata_uang_edit';
                $deleteGate    = 'mata_uang_delete';
                $crudRoutePart = 'mata-uangs';

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
            $table->editColumn('mata_uang', function ($row) {
                return $row->mata_uang ? $row->mata_uang : '';
            });
            $table->editColumn('simbol', function ($row) {
                return $row->simbol ? $row->simbol : '';
            });
            $table->editColumn('kurs', function ($row) {
                return $row->kurs ? $row->kurs : '';
            });
            $table->editColumn('fiskal', function ($row) {
                return $row->fiskal ? $row->fiskal : '';
            });
            $table->editColumn('rate_type', function ($row) {
                return $row->rate_type ? MataUang::RATE_TYPE_SELECT[$row->rate_type] : '';
            });
            $table->editColumn('default', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->default ? 'checked' : null) . '>';
            });

            $table->rawColumns(['actions', 'placeholder', 'default']);

            return $table->make(true);
        }

        return view('admin.mataUangs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('mata_uang_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mataUangs.create');
    }

    public function store(StoreMataUangRequest $request)
    {
        $mataUang = MataUang::create($request->all());

        return redirect()->route('admin.mata-uangs.index');
    }

    public function edit(MataUang $mataUang)
    {
        abort_if(Gate::denies('mata_uang_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mataUangs.edit', compact('mataUang'));
    }

    public function update(UpdateMataUangRequest $request, MataUang $mataUang)
    {
        $mataUang->update($request->all());

        return redirect()->route('admin.mata-uangs.index');
    }

    public function show(MataUang $mataUang)
    {
        abort_if(Gate::denies('mata_uang_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mataUangs.show', compact('mataUang'));
    }

    public function destroy(MataUang $mataUang)
    {
        abort_if(Gate::denies('mata_uang_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mataUang->delete();

        return back();
    }

    public function massDestroy(MassDestroyMataUangRequest $request)
    {
        $mataUangs = MataUang::find(request('ids'));

        foreach ($mataUangs as $mataUang) {
            $mataUang->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
