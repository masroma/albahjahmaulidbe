<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyItemGroupOneRequest;
use App\Http\Requests\StoreItemGroupOneRequest;
use App\Http\Requests\UpdateItemGroupOneRequest;
use App\Models\ItemGroupOne;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ItemGroupOneController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('item_group_one_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ItemGroupOne::query()->select(sprintf('%s.*', (new ItemGroupOne())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'item_group_one_show';
                $editGate = 'item_group_one_edit';
                $deleteGate = 'item_group_one_delete';
                $crudRoutePart = 'item-group-ones';

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
            $table->editColumn('nama', function ($row) {
                return $row->nama ? $row->nama : '';
            });
            $table->editColumn('item_type', function ($row) {
                return $row->item_type ? ItemGroupOne::ITEM_TYPE_SELECT[$row->item_type] : '';
            });
            $table->editColumn('akun_pembelian', function ($row) {
                return $row->akun_pembelian ? ItemGroupOne::AKUN_PEMBELIAN_SELECT[$row->akun_pembelian] : '';
            });
            $table->editColumn('akun_hpp', function ($row) {
                return $row->akun_hpp ? ItemGroupOne::AKUN_HPP_SELECT[$row->akun_hpp] : '';
            });
            $table->editColumn('akun_penjualan', function ($row) {
                return $row->akun_penjualan ? ItemGroupOne::AKUN_PENJUALAN_SELECT[$row->akun_penjualan] : '';
            });
            $table->editColumn('akun_retur_penjualan', function ($row) {
                return $row->akun_retur_penjualan ? $row->akun_retur_penjualan : '';
            });
            $table->editColumn('tampil_pos', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->tampil_pos ? 'checked' : null) . '>';
            });

            $table->rawColumns(['actions', 'placeholder', 'tampil_pos']);

            return $table->make(true);
        }

        return view('admin.itemGroupOnes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('item_group_one_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.itemGroupOnes.create');
    }

    public function store(StoreItemGroupOneRequest $request)
    {
        $itemGroupOne = ItemGroupOne::create($request->all());

        return redirect()->route('admin.item-group-ones.index');
    }

    public function edit(ItemGroupOne $itemGroupOne)
    {
        abort_if(Gate::denies('item_group_one_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.itemGroupOnes.edit', compact('itemGroupOne'));
    }

    public function update(UpdateItemGroupOneRequest $request, ItemGroupOne $itemGroupOne)
    {
        $itemGroupOne->update($request->all());

        return redirect()->route('admin.item-group-ones.index');
    }

    public function show(ItemGroupOne $itemGroupOne)
    {
        abort_if(Gate::denies('item_group_one_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemGroupOne->load('itemGroupOneItems');

        return view('admin.itemGroupOnes.show', compact('itemGroupOne'));
    }

    public function destroy(ItemGroupOne $itemGroupOne)
    {
        abort_if(Gate::denies('item_group_one_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemGroupOne->delete();

        return back();
    }

    public function massDestroy(MassDestroyItemGroupOneRequest $request)
    {
        ItemGroupOne::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
