<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAkunKlasifikasiRequest;
use App\Http\Requests\StoreAkunKlasifikasiRequest;
use App\Http\Requests\UpdateAkunKlasifikasiRequest;
use App\Models\AkunKlasifikasi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AkunKlasifikasiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('akun_klasifikasi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $akunKlasifikasis = AkunKlasifikasi::all();

        return view('admin.akunKlasifikasis.index', compact('akunKlasifikasis'));
    }

    public function create()
    {
        abort_if(Gate::denies('akun_klasifikasi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.akunKlasifikasis.create');
    }

    public function store(StoreAkunKlasifikasiRequest $request)
    {
        $akunKlasifikasi = AkunKlasifikasi::create($request->all());

        return redirect()->route('admin.akun-klasifikasis.index');
    }

    public function edit(AkunKlasifikasi $akunKlasifikasi)
    {
        abort_if(Gate::denies('akun_klasifikasi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.akunKlasifikasis.edit', compact('akunKlasifikasi'));
    }

    public function update(UpdateAkunKlasifikasiRequest $request, AkunKlasifikasi $akunKlasifikasi)
    {
        $akunKlasifikasi->update($request->all());

        return redirect()->route('admin.akun-klasifikasis.index');
    }

    public function show(AkunKlasifikasi $akunKlasifikasi)
    {
        abort_if(Gate::denies('akun_klasifikasi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $akunKlasifikasi->load('akunKlasifikasiAkuns');

        return view('admin.akunKlasifikasis.show', compact('akunKlasifikasi'));
    }

    public function destroy(AkunKlasifikasi $akunKlasifikasi)
    {
        abort_if(Gate::denies('akun_klasifikasi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $akunKlasifikasi->delete();

        return back();
    }

    public function massDestroy(MassDestroyAkunKlasifikasiRequest $request)
    {
        AkunKlasifikasi::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
