<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAkunParentRequest;
use App\Http\Requests\StoreAkunParentRequest;
use App\Http\Requests\UpdateAkunParentRequest;
use App\Models\AkunParent;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AkunParentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('akun_parent_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $akunParents = AkunParent::all();

        return view('admin.akunParents.index', compact('akunParents'));
    }

    public function create()
    {
        abort_if(Gate::denies('akun_parent_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.akunParents.create');
    }

    public function store(StoreAkunParentRequest $request)
    {
        $akunParent = AkunParent::create($request->all());

        return redirect()->route('admin.akun-parents.index');
    }

    public function edit(AkunParent $akunParent)
    {
        abort_if(Gate::denies('akun_parent_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.akunParents.edit', compact('akunParent'));
    }

    public function update(UpdateAkunParentRequest $request, AkunParent $akunParent)
    {
        $akunParent->update($request->all());

        return redirect()->route('admin.akun-parents.index');
    }

    public function show(AkunParent $akunParent)
    {
        abort_if(Gate::denies('akun_parent_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $akunParent->load('akunParentAkuns');

        return view('admin.akunParents.show', compact('akunParent'));
    }

    public function destroy(AkunParent $akunParent)
    {
        abort_if(Gate::denies('akun_parent_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $akunParent->delete();

        return back();
    }

    public function massDestroy(MassDestroyAkunParentRequest $request)
    {
        AkunParent::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
