<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyKasBankRequest;
use App\Http\Requests\StoreKasBankRequest;
use App\Http\Requests\UpdateKasBankRequest;
use App\Models\KasBank;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class KasBankController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('kas_bank_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = KasBank::query()->select(sprintf('%s.*', (new KasBank)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'kas_bank_show';
                $editGate      = 'kas_bank_edit';
                $deleteGate    = 'kas_bank_delete';
                $crudRoutePart = 'kas-banks';

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
            $table->editColumn('tipe_kas', function ($row) {
                return $row->tipe_kas ? KasBank::TIPE_KAS_SELECT[$row->tipe_kas] : '';
            });
            $table->editColumn('akun', function ($row) {
                return $row->akun ? KasBank::AKUN_SELECT[$row->akun] : '';
            });
            $table->editColumn('nama', function ($row) {
                return $row->nama ? $row->nama : '';
            });
            $table->editColumn('mata_uang', function ($row) {
                return $row->mata_uang ? KasBank::MATA_UANG_SELECT[$row->mata_uang] : '';
            });
            $table->editColumn('saldo', function ($row) {
                return $row->saldo ? $row->saldo : '';
            });
            $table->editColumn('tot_giro_keluar', function ($row) {
                return $row->tot_giro_keluar ? $row->tot_giro_keluar : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.kasBanks.index');
    }

    public function create()
    {
        abort_if(Gate::denies('kas_bank_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kasBanks.create');
    }

    public function store(StoreKasBankRequest $request)
    {
        $kasBank = KasBank::create($request->all());

        return redirect()->route('admin.kas-banks.index');
    }

    public function edit(KasBank $kasBank)
    {
        abort_if(Gate::denies('kas_bank_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kasBanks.edit', compact('kasBank'));
    }

    public function update(UpdateKasBankRequest $request, KasBank $kasBank)
    {
        $kasBank->update($request->all());

        return redirect()->route('admin.kas-banks.index');
    }

    public function show(KasBank $kasBank)
    {
        abort_if(Gate::denies('kas_bank_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kasBanks.show', compact('kasBank'));
    }

    public function destroy(KasBank $kasBank)
    {
        abort_if(Gate::denies('kas_bank_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kasBank->delete();

        return back();
    }

    public function massDestroy(MassDestroyKasBankRequest $request)
    {
        $kasBanks = KasBank::find(request('ids'));

        foreach ($kasBanks as $kasBank) {
            $kasBank->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
