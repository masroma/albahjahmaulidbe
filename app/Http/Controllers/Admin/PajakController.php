<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPajakRequest;
use App\Http\Requests\StorePajakRequest;
use App\Http\Requests\UpdatePajakRequest;
use App\Models\Akun;
use App\Models\Pajak;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PajakController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('pajak_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Pajak::with(['akun_pembelian', 'akun_penjualan'])->select(sprintf('%s.*', (new Pajak())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'pajak_show';
                $editGate = 'pajak_edit';
                $deleteGate = 'pajak_delete';
                $crudRoutePart = 'pajaks';

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
            $table->editColumn('nama_pajak', function ($row) {
                return $row->nama_pajak ? $row->nama_pajak : '';
            });
            $table->addColumn('akun_pembelian_akun_kode', function ($row) {
                return $row->akun_pembelian ? $row->akun_pembelian->akun_kode : '';
            });

            $table->addColumn('akun_penjualan_akun_kode', function ($row) {
                return $row->akun_penjualan ? $row->akun_penjualan->akun_kode : '';
            });

            $table->editColumn('presentasi_npwp', function ($row) {
                return $row->presentasi_npwp ? $row->presentasi_npwp : '';
            });
            $table->editColumn('presentasi_non_npwp', function ($row) {
                return $row->presentasi_non_npwp ? $row->presentasi_non_npwp : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'akun_pembelian', 'akun_penjualan']);

            return $table->make(true);
        }

        return view('admin.pajaks.index');
    }

    public function create()
    {
        abort_if(Gate::denies('pajak_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $akun_pembelians = Akun::pluck('akun_kode', 'id')->prepend(trans('global.pleaseSelect'), '');

        $akun_penjualans = Akun::pluck('akun_kode', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.pajaks.create', compact('akun_pembelians', 'akun_penjualans'));
    }

    public function store(StorePajakRequest $request)
    {
        $pajak = Pajak::create($request->all());

        return redirect()->route('admin.pajaks.index');
    }

    public function edit(Pajak $pajak)
    {
        abort_if(Gate::denies('pajak_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $akun_pembelians = Akun::pluck('akun_kode', 'id')->prepend(trans('global.pleaseSelect'), '');

        $akun_penjualans = Akun::pluck('akun_kode', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pajak->load('akun_pembelian', 'akun_penjualan');

        return view('admin.pajaks.edit', compact('akun_pembelians', 'akun_penjualans', 'pajak'));
    }

    public function update(UpdatePajakRequest $request, Pajak $pajak)
    {
        $pajak->update($request->all());

        return redirect()->route('admin.pajaks.index');
    }

    public function show(Pajak $pajak)
    {
        abort_if(Gate::denies('pajak_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pajak->load('akun_pembelian', 'akun_penjualan');

        return view('admin.pajaks.show', compact('pajak'));
    }

    public function destroy(Pajak $pajak)
    {
        abort_if(Gate::denies('pajak_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pajak->delete();

        return back();
    }

    public function massDestroy(MassDestroyPajakRequest $request)
    {
        Pajak::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
