<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAlamatMitraBisniRequest;
use App\Http\Requests\StoreAlamatMitraBisniRequest;
use App\Http\Requests\UpdateAlamatMitraBisniRequest;
use App\Models\AlamatMitraBisni;
use App\Models\Kotum;
use App\Models\MitraBisni;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AlamatMitraBisnisController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('alamat_mitra_bisni_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AlamatMitraBisni::with(['mitra_bisnis', 'kotas'])->select(sprintf('%s.*', (new AlamatMitraBisni())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'alamat_mitra_bisni_show';
                $editGate = 'alamat_mitra_bisni_edit';
                $deleteGate = 'alamat_mitra_bisni_delete';
                $crudRoutePart = 'alamat-mitra-bisnis';

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
            $table->editColumn('keterangan_alamat', function ($row) {
                return $row->keterangan_alamat ? $row->keterangan_alamat : '';
            });
            $table->editColumn('alamat_lengkap', function ($row) {
                return $row->alamat_lengkap ? $row->alamat_lengkap : '';
            });
            $table->editColumn('kota', function ($row) {
                $labels = [];
                foreach ($row->kotas as $kotum) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $kotum->nama);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('telepon', function ($row) {
                return $row->telepon ? $row->telepon : '';
            });
            $table->editColumn('fax', function ($row) {
                return $row->fax ? $row->fax : '';
            });
            $table->editColumn('kode_pos', function ($row) {
                return $row->kode_pos ? $row->kode_pos : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'mitra_bisnis', 'kota']);

            return $table->make(true);
        }

        return view('admin.alamatMitraBisnis.index');
    }

    public function create()
    {
        abort_if(Gate::denies('alamat_mitra_bisni_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mitra_bisnis = MitraBisni::pluck('nama', 'id');

        $kotas = Kotum::pluck('nama', 'id');

        return view('admin.alamatMitraBisnis.create', compact('kotas', 'mitra_bisnis'));
    }

    public function store(StoreAlamatMitraBisniRequest $request)
    {
        $alamatMitraBisni = AlamatMitraBisni::create($request->all());
        $alamatMitraBisni->mitra_bisnis()->sync($request->input('mitra_bisnis', []));
        $alamatMitraBisni->kotas()->sync($request->input('kotas', []));

        return redirect()->route('admin.alamat-mitra-bisnis.index');
    }

    public function edit(AlamatMitraBisni $alamatMitraBisni)
    {
        abort_if(Gate::denies('alamat_mitra_bisni_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mitra_bisnis = MitraBisni::pluck('nama', 'id');

        $kotas = Kotum::pluck('nama', 'id');

        $alamatMitraBisni->load('mitra_bisnis', 'kotas');

        return view('admin.alamatMitraBisnis.edit', compact('alamatMitraBisni', 'kotas', 'mitra_bisnis'));
    }

    public function update(UpdateAlamatMitraBisniRequest $request, AlamatMitraBisni $alamatMitraBisni)
    {
        $alamatMitraBisni->update($request->all());
        $alamatMitraBisni->mitra_bisnis()->sync($request->input('mitra_bisnis', []));
        $alamatMitraBisni->kotas()->sync($request->input('kotas', []));

        return redirect()->route('admin.alamat-mitra-bisnis.index');
    }

    public function show(AlamatMitraBisni $alamatMitraBisni)
    {
        abort_if(Gate::denies('alamat_mitra_bisni_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $alamatMitraBisni->load('mitra_bisnis', 'kotas');

        return view('admin.alamatMitraBisnis.show', compact('alamatMitraBisni'));
    }

    public function destroy(AlamatMitraBisni $alamatMitraBisni)
    {
        abort_if(Gate::denies('alamat_mitra_bisni_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $alamatMitraBisni->delete();

        return back();
    }

    public function massDestroy(MassDestroyAlamatMitraBisniRequest $request)
    {
        AlamatMitraBisni::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
