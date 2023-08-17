<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPajakItemRequest;
use App\Http\Requests\StorePajakItemRequest;
use App\Http\Requests\UpdatePajakItemRequest;
use App\Models\Item;
use App\Models\Pajak;
use App\Models\PajakItem;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PajakItemController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('pajak_item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = PajakItem::with(['item', 'pajak'])->select(sprintf('%s.*', (new PajakItem())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'pajak_item_show';
                $editGate = 'pajak_item_edit';
                $deleteGate = 'pajak_item_delete';
                $crudRoutePart = 'pajak-items';

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

            $table->addColumn('pajak_nama_pajak', function ($row) {
                return $row->pajak ? $row->pajak->nama_pajak : '';
            });

            $table->editColumn('perhitungan', function ($row) {
                return $row->perhitungan ? PajakItem::PERHITUNGAN_SELECT[$row->perhitungan] : '';
            });
            $table->editColumn('tipe_pajak_item', function ($row) {
                return $row->tipe_pajak_item ? PajakItem::TIPE_PAJAK_ITEM_SELECT[$row->tipe_pajak_item] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'item', 'pajak']);

            return $table->make(true);
        }

        return view('admin.pajakItems.index');
    }

    public function create()
    {
        abort_if(Gate::denies('pajak_item_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $items = Item::pluck('item_nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pajaks = Pajak::pluck('nama_pajak', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.pajakItems.create', compact('items', 'pajaks'));
    }

    public function store(StorePajakItemRequest $request)
    {
        $pajakItem = PajakItem::create($request->all());

        return redirect()->route('admin.pajak-items.index');
    }

    public function edit(PajakItem $pajakItem)
    {
        abort_if(Gate::denies('pajak_item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $items = Item::pluck('item_nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pajaks = Pajak::pluck('nama_pajak', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pajakItem->load('item', 'pajak');

        return view('admin.pajakItems.edit', compact('items', 'pajakItem', 'pajaks'));
    }

    public function update(UpdatePajakItemRequest $request, PajakItem $pajakItem)
    {
        $pajakItem->update($request->all());

        return redirect()->route('admin.pajak-items.index');
    }

    public function show(PajakItem $pajakItem)
    {
        abort_if(Gate::denies('pajak_item_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pajakItem->load('item', 'pajak');

        return view('admin.pajakItems.show', compact('pajakItem'));
    }

    public function destroy(PajakItem $pajakItem)
    {
        abort_if(Gate::denies('pajak_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pajakItem->delete();

        return back();
    }

    public function massDestroy(MassDestroyPajakItemRequest $request)
    {
        PajakItem::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
