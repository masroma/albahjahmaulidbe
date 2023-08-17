<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAkunRequest;
use App\Http\Requests\StoreAkunRequest;
use App\Http\Requests\UpdateAkunRequest;
use App\Models\Akun;
use App\Models\AkunJeni;
use App\Models\AkunKlasifikasi;
use App\Models\AkunParent;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AkunController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('akun_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $akuns = Akun::with(['akun_parent', 'akun_jenis', 'akun_klasifikasi'])->get();

        $akun_parents = AkunParent::get();

        $akun_jenis = AkunJeni::get();

        $akun_klasifikasis = AkunKlasifikasi::get();

        return view('admin.akuns.index', compact('akun_jenis', 'akun_klasifikasis', 'akun_parents', 'akuns'));
    }

    public function create()
    {
        abort_if(Gate::denies('akun_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $akun_parents = AkunParent::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $akun_jenis = AkunJeni::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $akun_klasifikasis = AkunKlasifikasi::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.akuns.create', compact('akun_jenis', 'akun_klasifikasis', 'akun_parents'));
    }

    public function store(StoreAkunRequest $request)
    {
        $akun = Akun::create($request->all());

        return redirect()->route('admin.akuns.index');
    }

    public function edit(Akun $akun)
    {
        abort_if(Gate::denies('akun_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $akun_parents = AkunParent::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $akun_jenis = AkunJeni::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $akun_klasifikasis = AkunKlasifikasi::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $akun->load('akun_parent', 'akun_jenis', 'akun_klasifikasi');

        return view('admin.akuns.edit', compact('akun', 'akun_jenis', 'akun_klasifikasis', 'akun_parents'));
    }

    public function update(UpdateAkunRequest $request, Akun $akun)
    {
        $akun->update($request->all());

        return redirect()->route('admin.akuns.index');
    }

    public function show(Akun $akun)
    {
        abort_if(Gate::denies('akun_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $akun->load('akun_parent', 'akun_jenis', 'akun_klasifikasi', 'itemAkunPembelianItems', 'itemAkunHppItems', 'itemAkunPenjualanItems', 'itemAkunReturnPenjualanItems');

        return view('admin.akuns.show', compact('akun'));
    }

    public function destroy(Akun $akun)
    {
        abort_if(Gate::denies('akun_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $akun->delete();

        return back();
    }

    public function massDestroy(MassDestroyAkunRequest $request)
    {
        $akuns = Akun::find(request('ids'));

        foreach ($akuns as $akun) {
            $akun->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
