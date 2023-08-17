<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTerminalKasirRequest;
use App\Http\Requests\StoreTerminalKasirRequest;
use App\Http\Requests\UpdateTerminalKasirRequest;
use App\Models\TerminalKasir;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TerminalKasirController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('terminal_kasir_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = TerminalKasir::query()->select(sprintf('%s.*', (new TerminalKasir())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'terminal_kasir_show';
                $editGate = 'terminal_kasir_edit';
                $deleteGate = 'terminal_kasir_delete';
                $crudRoutePart = 'terminal-kasirs';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('kode_pos', function ($row) {
                return $row->kode_pos ? $row->kode_pos : '';
            });
            $table->editColumn('nama', function ($row) {
                return $row->nama ? $row->nama : '';
            });
            $table->editColumn('cabang', function ($row) {
                return $row->cabang ? TerminalKasir::CABANG_SELECT[$row->cabang] : '';
            });
            $table->editColumn('gudang', function ($row) {
                return $row->gudang ? TerminalKasir::GUDANG_SELECT[$row->gudang] : '';
            });
            $table->editColumn('kas_kasir', function ($row) {
                return $row->kas_kasir ? TerminalKasir::KAS_KASIR_SELECT[$row->kas_kasir] : '';
            });
            $table->editColumn('kas_setor', function ($row) {
                return $row->kas_setor ? TerminalKasir::KAS_SETOR_SELECT[$row->kas_setor] : '';
            });
            $table->editColumn('aktif', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->aktif ? 'checked' : null) . '>';
            });

            $table->rawColumns(['actions', 'placeholder', 'aktif']);

            return $table->make(true);
        }

        return view('admin.terminalKasirs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('terminal_kasir_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.terminalKasirs.create');
    }

    public function store(StoreTerminalKasirRequest $request)
    {
        $terminalKasir = TerminalKasir::create($request->all());

        return redirect()->route('admin.terminal-kasirs.index');
    }

    public function edit(TerminalKasir $terminalKasir)
    {
        abort_if(Gate::denies('terminal_kasir_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.terminalKasirs.edit', compact('terminalKasir'));
    }

    public function update(UpdateTerminalKasirRequest $request, TerminalKasir $terminalKasir)
    {
        $terminalKasir->update($request->all());

        return redirect()->route('admin.terminal-kasirs.index');
    }

    public function show(TerminalKasir $terminalKasir)
    {
        abort_if(Gate::denies('terminal_kasir_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.terminalKasirs.show', compact('terminalKasir'));
    }

    public function destroy(TerminalKasir $terminalKasir)
    {
        abort_if(Gate::denies('terminal_kasir_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $terminalKasir->delete();

        return back();
    }

    public function massDestroy(MassDestroyTerminalKasirRequest $request)
    {
        TerminalKasir::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
