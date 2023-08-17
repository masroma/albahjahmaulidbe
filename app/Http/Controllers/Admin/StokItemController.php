<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyStokItemRequest;
use App\Http\Requests\StoreStokItemRequest;
use App\Http\Requests\UpdateStokItemRequest;
use App\Models\Item;
use App\Models\StokItem;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class StokItemController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('stok_item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = StokItem::with(['item'])->select(sprintf('%s.*', (new StokItem())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'stok_item_show';
                $editGate = 'stok_item_edit';
                $deleteGate = 'stok_item_delete';
                $crudRoutePart = 'stok-items';

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

            $table->editColumn('item.item_nama', function ($row) {
                return $row->item ? (is_string($row->item) ? $row->item : $row->item->item_nama) : '';
            });
            $table->editColumn('location', function ($row) {
                return $row->location ? $row->location : '';
            });
            $table->editColumn('qty', function ($row) {
                return $row->qty ? $row->qty : '';
            });
            $table->editColumn('pid', function ($row) {
                return $row->pid ? $row->pid : '';
            });
            $table->editColumn('hpp', function ($row) {
                return $row->hpp ? $row->hpp : '';
            });
            $table->editColumn('min', function ($row) {
                return $row->min ? $row->min : '';
            });
            $table->editColumn('max', function ($row) {
                return $row->max ? $row->max : '';
            });
            $table->editColumn('re_order', function ($row) {
                return $row->re_order ? $row->re_order : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'item']);

            return $table->make(true);
        }

        return view('admin.stokItems.index');
    }

    public function create()
    {
        abort_if(Gate::denies('stok_item_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $items = Item::pluck('item_nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.stokItems.create', compact('items'));
    }

    public function store(StoreStokItemRequest $request)
    {
        $stokItem = StokItem::create($request->all());

        return redirect()->route('admin.stok-items.index');
    }

    public function edit(StokItem $stokItem)
    {
        abort_if(Gate::denies('stok_item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $items = Item::pluck('item_nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $stokItem->load('item');

        return view('admin.stokItems.edit', compact('items', 'stokItem'));
    }

    public function update(UpdateStokItemRequest $request, StokItem $stokItem)
    {
        $stokItem->update($request->all());

        return redirect()->route('admin.stok-items.index');
    }

    public function show(StokItem $stokItem)
    {
        abort_if(Gate::denies('stok_item_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stokItem->load('item');

        return view('admin.stokItems.show', compact('stokItem'));
    }

    public function destroy(StokItem $stokItem)
    {
        abort_if(Gate::denies('stok_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stokItem->delete();

        return back();
    }

    public function massDestroy(MassDestroyStokItemRequest $request)
    {
        StokItem::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
