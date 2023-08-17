<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAkunJeniRequest;
use App\Http\Requests\StoreAkunJeniRequest;
use App\Http\Requests\UpdateAkunJeniRequest;
use App\Models\AkunJeni;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AkunJenisController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('akun_jeni_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $akunJenis = AkunJeni::all();

        return view('admin.akunJenis.index', compact('akunJenis'));
    }

    public function create()
    {
        abort_if(Gate::denies('akun_jeni_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.akunJenis.create');
    }

    public function store(StoreAkunJeniRequest $request)
    {
        $akunJeni = AkunJeni::create($request->all());

        return redirect()->route('admin.akun-jenis.index');
    }

    public function edit(AkunJeni $akunJeni)
    {
        abort_if(Gate::denies('akun_jeni_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.akunJenis.edit', compact('akunJeni'));
    }

    public function update(UpdateAkunJeniRequest $request, AkunJeni $akunJeni)
    {
        $akunJeni->update($request->all());

        return redirect()->route('admin.akun-jenis.index');
    }

    public function show(AkunJeni $akunJeni)
    {
        abort_if(Gate::denies('akun_jeni_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $akunJeni->load('akunJenisAkuns');

        return view('admin.akunJenis.show', compact('akunJeni'));
    }

    public function destroy(AkunJeni $akunJeni)
    {
        abort_if(Gate::denies('akun_jeni_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $akunJeni->delete();

        return back();
    }

    public function massDestroy(MassDestroyAkunJeniRequest $request)
    {
        AkunJeni::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
