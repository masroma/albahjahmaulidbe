<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHargaJualItemRequest;
use App\Http\Requests\StoreHargaJualItemRequest;
use App\Http\Requests\UpdateHargaJualItemRequest;
use App\Models\HargaJualItem;
use App\Models\Item;
use App\Models\LevelHarga;
use App\Models\MataUang;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class HargaJualItemController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('harga_jual_item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = HargaJualItem::with(['item', 'level_harga', 'mata_uang'])->select(sprintf('%s.*', (new HargaJualItem())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'harga_jual_item_show';
                $editGate = 'harga_jual_item_edit';
                $deleteGate = 'harga_jual_item_delete';
                $crudRoutePart = 'harga-jual-items';

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
            $table->addColumn('item_item_nama', function ($row) {
                return $row->item ? $row->item->item_nama : '';
            });

            $table->addColumn('level_harga_keterangan', function ($row) {
                return $row->level_harga ? $row->level_harga->keterangan : '';
            });

            $table->addColumn('mata_uang_mata_uang', function ($row) {
                return $row->mata_uang ? $row->mata_uang->mata_uang : '';
            });

            $table->editColumn('harga_satuan_1', function ($row) {
                return $row->harga_satuan_1 ? $row->harga_satuan_1 : '';
            });
            $table->editColumn('diskon_satuan_1', function ($row) {
                return $row->diskon_satuan_1 ? $row->diskon_satuan_1 : '';
            });
            $table->editColumn('harga_satuan_2', function ($row) {
                return $row->harga_satuan_2 ? $row->harga_satuan_2 : '';
            });
            $table->editColumn('diskon_satuan_2', function ($row) {
                return $row->diskon_satuan_2 ? $row->diskon_satuan_2 : '';
            });
            $table->editColumn('harga_satuan_3', function ($row) {
                return $row->harga_satuan_3 ? $row->harga_satuan_3 : '';
            });
            $table->editColumn('diskon_satuan_3', function ($row) {
                return $row->diskon_satuan_3 ? $row->diskon_satuan_3 : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'item', 'level_harga', 'mata_uang']);

            return $table->make(true);
        }

        return view('admin.hargaJualItems.index');
    }

    public function create()
    {
        abort_if(Gate::denies('harga_jual_item_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $items = Item::pluck('item_nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $level_hargas = LevelHarga::pluck('keterangan', 'id')->prepend(trans('global.pleaseSelect'), '');

        $mata_uangs = MataUang::pluck('mata_uang', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.hargaJualItems.create', compact('items', 'level_hargas', 'mata_uangs'));
    }

    public function store(StoreHargaJualItemRequest $request)
    {
        $hargaJualItem = HargaJualItem::create($request->all());

        return redirect()->route('admin.harga-jual-items.index');
    }

    public function edit(HargaJualItem $hargaJualItem)
    {
        abort_if(Gate::denies('harga_jual_item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $items = Item::pluck('item_nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $level_hargas = LevelHarga::pluck('keterangan', 'id')->prepend(trans('global.pleaseSelect'), '');

        $mata_uangs = MataUang::pluck('mata_uang', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hargaJualItem->load('item', 'level_harga', 'mata_uang');

        return view('admin.hargaJualItems.edit', compact('hargaJualItem', 'items', 'level_hargas', 'mata_uangs'));
    }

    public function update(UpdateHargaJualItemRequest $request, HargaJualItem $hargaJualItem)
    {
        $hargaJualItem->update($request->all());

        return redirect()->route('admin.harga-jual-items.index');
    }

    public function show(HargaJualItem $hargaJualItem)
    {
        abort_if(Gate::denies('harga_jual_item_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hargaJualItem->load('item', 'level_harga', 'mata_uang');

        return view('admin.hargaJualItems.show', compact('hargaJualItem'));
    }

    public function destroy(HargaJualItem $hargaJualItem)
    {
        abort_if(Gate::denies('harga_jual_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hargaJualItem->delete();

        return back();
    }

    public function massDestroy(MassDestroyHargaJualItemRequest $request)
    {
        HargaJualItem::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
