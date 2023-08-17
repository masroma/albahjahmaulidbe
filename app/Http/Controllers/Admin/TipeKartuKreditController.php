<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTipeKartuKreditRequest;
use App\Http\Requests\StoreTipeKartuKreditRequest;
use App\Http\Requests\UpdateTipeKartuKreditRequest;
use App\Models\TipeKartuKredit;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TipeKartuKreditController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('tipe_kartu_kredit_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = TipeKartuKredit::query()->select(sprintf('%s.*', (new TipeKartuKredit())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'tipe_kartu_kredit_show';
                $editGate = 'tipe_kartu_kredit_edit';
                $deleteGate = 'tipe_kartu_kredit_delete';
                $crudRoutePart = 'tipe-kartu-kredits';

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
            $table->editColumn('kode', function ($row) {
                return $row->kode ? $row->kode : '';
            });
            $table->editColumn('nama_kartu_kredit', function ($row) {
                return $row->nama_kartu_kredit ? $row->nama_kartu_kredit : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.tipeKartuKredits.index');
    }

    public function create()
    {
        abort_if(Gate::denies('tipe_kartu_kredit_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tipeKartuKredits.create');
    }

    public function store(StoreTipeKartuKreditRequest $request)
    {
        $tipeKartuKredit = TipeKartuKredit::create($request->all());

        return redirect()->route('admin.tipe-kartu-kredits.index');
    }

    public function edit(TipeKartuKredit $tipeKartuKredit)
    {
        abort_if(Gate::denies('tipe_kartu_kredit_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tipeKartuKredits.edit', compact('tipeKartuKredit'));
    }

    public function update(UpdateTipeKartuKreditRequest $request, TipeKartuKredit $tipeKartuKredit)
    {
        $tipeKartuKredit->update($request->all());

        return redirect()->route('admin.tipe-kartu-kredits.index');
    }

    public function show(TipeKartuKredit $tipeKartuKredit)
    {
        abort_if(Gate::denies('tipe_kartu_kredit_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tipeKartuKredits.show', compact('tipeKartuKredit'));
    }

    public function destroy(TipeKartuKredit $tipeKartuKredit)
    {
        abort_if(Gate::denies('tipe_kartu_kredit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tipeKartuKredit->delete();

        return back();
    }

    public function massDestroy(MassDestroyTipeKartuKreditRequest $request)
    {
        TipeKartuKredit::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
