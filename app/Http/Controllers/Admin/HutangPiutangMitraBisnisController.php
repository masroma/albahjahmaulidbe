<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHutangPiutangMitraBisniRequest;
use App\Http\Requests\StoreHutangPiutangMitraBisniRequest;
use App\Http\Requests\UpdateHutangPiutangMitraBisniRequest;
use App\Models\Akun;
use App\Models\AkunParent;
use App\Models\HutangPiutangMitraBisni;
use App\Models\MataUang;
use App\Models\MitraBisni;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class HutangPiutangMitraBisnisController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('hutang_piutang_mitra_bisni_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = HutangPiutangMitraBisni::with(['mitra_bisnis', 'mata_uangs', 'akun_hutangs', 'akun_stakeholder_piutangs'])->select(sprintf('%s.*', (new HutangPiutangMitraBisni())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'hutang_piutang_mitra_bisni_show';
                $editGate = 'hutang_piutang_mitra_bisni_edit';
                $deleteGate = 'hutang_piutang_mitra_bisni_delete';
                $crudRoutePart = 'hutang-piutang-mitra-bisnis';

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
            $table->editColumn('mitra_bisnis', function ($row) {
                $labels = [];
                foreach ($row->mitra_bisnis as $mitra_bisni) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $mitra_bisni->nama);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('mata_uang', function ($row) {
                $labels = [];
                foreach ($row->mata_uangs as $mata_uang) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $mata_uang->mata_uang);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('pembelian_termin', function ($row) {
                return $row->pembelian_termin ? HutangPiutangMitraBisni::PEMBELIAN_TERMIN_SELECT[$row->pembelian_termin] : '';
            });
            $table->editColumn('pembelian_tempo', function ($row) {
                return $row->pembelian_tempo ? $row->pembelian_tempo : '';
            });
            $table->editColumn('penjualan_termin', function ($row) {
                return $row->penjualan_termin ? HutangPiutangMitraBisni::PENJUALAN_TERMIN_SELECT[$row->penjualan_termin] : '';
            });
            $table->editColumn('penjualan_tempo', function ($row) {
                return $row->penjualan_tempo ? $row->penjualan_tempo : '';
            });
            $table->editColumn('batas_hutang', function ($row) {
                return $row->batas_hutang ? $row->batas_hutang : '';
            });
            $table->editColumn('batas_frekuensi_hutang', function ($row) {
                return $row->batas_frekuensi_hutang ? $row->batas_frekuensi_hutang : '';
            });
            $table->editColumn('akun_hutang', function ($row) {
                $labels = [];
                foreach ($row->akun_hutangs as $akun_hutang) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $akun_hutang->akun_nama);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('batas_piutang', function ($row) {
                return $row->batas_piutang ? $row->batas_piutang : '';
            });
            $table->editColumn('batas_frekuensi_piutang', function ($row) {
                return $row->batas_frekuensi_piutang ? $row->batas_frekuensi_piutang : '';
            });
            $table->editColumn('akun_stakeholder_piutang', function ($row) {
                $labels = [];
                foreach ($row->akun_stakeholder_piutangs as $akun_stakeholder_piutang) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $akun_stakeholder_piutang->nama);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'mitra_bisnis', 'mata_uang', 'akun_hutang', 'akun_stakeholder_piutang']);

            return $table->make(true);
        }

        return view('admin.hutangPiutangMitraBisnis.index');
    }

    public function create()
    {
        abort_if(Gate::denies('hutang_piutang_mitra_bisni_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mitra_bisnis = MitraBisni::pluck('nama', 'id');

        $mata_uangs = MataUang::pluck('mata_uang', 'id');

        $akun_hutangs = Akun::pluck('akun_nama', 'id');

        $akun_stakeholder_piutangs = AkunParent::pluck('nama', 'id');

        return view('admin.hutangPiutangMitraBisnis.create', compact('akun_hutangs', 'akun_stakeholder_piutangs', 'mata_uangs', 'mitra_bisnis'));
    }

    public function store(StoreHutangPiutangMitraBisniRequest $request)
    {
        $hutangPiutangMitraBisni = HutangPiutangMitraBisni::create($request->all());
        $hutangPiutangMitraBisni->mitra_bisnis()->sync($request->input('mitra_bisnis', []));
        $hutangPiutangMitraBisni->mata_uangs()->sync($request->input('mata_uangs', []));
        $hutangPiutangMitraBisni->akun_hutangs()->sync($request->input('akun_hutangs', []));
        $hutangPiutangMitraBisni->akun_stakeholder_piutangs()->sync($request->input('akun_stakeholder_piutangs', []));

        return redirect()->route('admin.hutang-piutang-mitra-bisnis.index');
    }

    public function edit(HutangPiutangMitraBisni $hutangPiutangMitraBisni)
    {
        abort_if(Gate::denies('hutang_piutang_mitra_bisni_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mitra_bisnis = MitraBisni::pluck('nama', 'id');

        $mata_uangs = MataUang::pluck('mata_uang', 'id');

        $akun_hutangs = Akun::pluck('akun_nama', 'id');

        $akun_stakeholder_piutangs = AkunParent::pluck('nama', 'id');

        $hutangPiutangMitraBisni->load('mitra_bisnis', 'mata_uangs', 'akun_hutangs', 'akun_stakeholder_piutangs');

        return view('admin.hutangPiutangMitraBisnis.edit', compact('akun_hutangs', 'akun_stakeholder_piutangs', 'hutangPiutangMitraBisni', 'mata_uangs', 'mitra_bisnis'));
    }

    public function update(UpdateHutangPiutangMitraBisniRequest $request, HutangPiutangMitraBisni $hutangPiutangMitraBisni)
    {
        $hutangPiutangMitraBisni->update($request->all());
        $hutangPiutangMitraBisni->mitra_bisnis()->sync($request->input('mitra_bisnis', []));
        $hutangPiutangMitraBisni->mata_uangs()->sync($request->input('mata_uangs', []));
        $hutangPiutangMitraBisni->akun_hutangs()->sync($request->input('akun_hutangs', []));
        $hutangPiutangMitraBisni->akun_stakeholder_piutangs()->sync($request->input('akun_stakeholder_piutangs', []));

        return redirect()->route('admin.hutang-piutang-mitra-bisnis.index');
    }

    public function show(HutangPiutangMitraBisni $hutangPiutangMitraBisni)
    {
        abort_if(Gate::denies('hutang_piutang_mitra_bisni_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hutangPiutangMitraBisni->load('mitra_bisnis', 'mata_uangs', 'akun_hutangs', 'akun_stakeholder_piutangs');

        return view('admin.hutangPiutangMitraBisnis.show', compact('hutangPiutangMitraBisni'));
    }

    public function destroy(HutangPiutangMitraBisni $hutangPiutangMitraBisni)
    {
        abort_if(Gate::denies('hutang_piutang_mitra_bisni_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hutangPiutangMitraBisni->delete();

        return back();
    }

    public function massDestroy(MassDestroyHutangPiutangMitraBisniRequest $request)
    {
        HutangPiutangMitraBisni::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
