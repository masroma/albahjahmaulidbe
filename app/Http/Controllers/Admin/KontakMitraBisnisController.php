<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyKontakMitraBisniRequest;
use App\Http\Requests\StoreKontakMitraBisniRequest;
use App\Http\Requests\UpdateKontakMitraBisniRequest;
use App\Models\KontakMitraBisni;
use App\Models\MitraBisni;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class KontakMitraBisnisController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('kontak_mitra_bisni_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = KontakMitraBisni::with(['mitra_bisnis'])->select(sprintf('%s.*', (new KontakMitraBisni())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'kontak_mitra_bisni_show';
                $editGate = 'kontak_mitra_bisni_edit';
                $deleteGate = 'kontak_mitra_bisni_delete';
                $crudRoutePart = 'kontak-mitra-bisnis';

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
            $table->editColumn('nama_kontak', function ($row) {
                return $row->nama_kontak ? $row->nama_kontak : '';
            });
            $table->editColumn('jabatan', function ($row) {
                return $row->jabatan ? $row->jabatan : '';
            });
            $table->editColumn('handphone', function ($row) {
                return $row->handphone ? $row->handphone : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'mitra_bisnis']);

            return $table->make(true);
        }

        return view('admin.kontakMitraBisnis.index');
    }

    public function create()
    {
        abort_if(Gate::denies('kontak_mitra_bisni_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mitra_bisnis = MitraBisni::pluck('nama', 'id');

        return view('admin.kontakMitraBisnis.create', compact('mitra_bisnis'));
    }

    public function store(StoreKontakMitraBisniRequest $request)
    {
        $kontakMitraBisni = KontakMitraBisni::create($request->all());
        $kontakMitraBisni->mitra_bisnis()->sync($request->input('mitra_bisnis', []));

        return redirect()->route('admin.kontak-mitra-bisnis.index');
    }

    public function edit(KontakMitraBisni $kontakMitraBisni)
    {
        abort_if(Gate::denies('kontak_mitra_bisni_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mitra_bisnis = MitraBisni::pluck('nama', 'id');

        $kontakMitraBisni->load('mitra_bisnis');

        return view('admin.kontakMitraBisnis.edit', compact('kontakMitraBisni', 'mitra_bisnis'));
    }

    public function update(UpdateKontakMitraBisniRequest $request, KontakMitraBisni $kontakMitraBisni)
    {
        $kontakMitraBisni->update($request->all());
        $kontakMitraBisni->mitra_bisnis()->sync($request->input('mitra_bisnis', []));

        return redirect()->route('admin.kontak-mitra-bisnis.index');
    }

    public function show(KontakMitraBisni $kontakMitraBisni)
    {
        abort_if(Gate::denies('kontak_mitra_bisni_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kontakMitraBisni->load('mitra_bisnis');

        return view('admin.kontakMitraBisnis.show', compact('kontakMitraBisni'));
    }

    public function destroy(KontakMitraBisni $kontakMitraBisni)
    {
        abort_if(Gate::denies('kontak_mitra_bisni_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kontakMitraBisni->delete();

        return back();
    }

    public function massDestroy(MassDestroyKontakMitraBisniRequest $request)
    {
        KontakMitraBisni::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
