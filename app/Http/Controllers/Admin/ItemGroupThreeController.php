<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyItemGroupThreeRequest;
use App\Http\Requests\StoreItemGroupThreeRequest;
use App\Http\Requests\UpdateItemGroupThreeRequest;
use App\Models\ItemGroupThree;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ItemGroupThreeController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('item_group_three_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ItemGroupThree::query()->select(sprintf('%s.*', (new ItemGroupThree())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'item_group_three_show';
                $editGate = 'item_group_three_edit';
                $deleteGate = 'item_group_three_delete';
                $crudRoutePart = 'item-group-threes';

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

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.itemGroupThrees.index');
    }

    public function create()
    {
        abort_if(Gate::denies('item_group_three_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.itemGroupThrees.create');
    }

    public function store(StoreItemGroupThreeRequest $request)
    {
        $itemGroupThree = ItemGroupThree::create($request->all());

        return redirect()->route('admin.item-group-threes.index');
    }

    public function edit(ItemGroupThree $itemGroupThree)
    {
        abort_if(Gate::denies('item_group_three_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.itemGroupThrees.edit', compact('itemGroupThree'));
    }

    public function update(UpdateItemGroupThreeRequest $request, ItemGroupThree $itemGroupThree)
    {
        $itemGroupThree->update($request->all());

        return redirect()->route('admin.item-group-threes.index');
    }

    public function show(ItemGroupThree $itemGroupThree)
    {
        abort_if(Gate::denies('item_group_three_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemGroupThree->load('itemGroupThreeItems');

        return view('admin.itemGroupThrees.show', compact('itemGroupThree'));
    }

    public function destroy(ItemGroupThree $itemGroupThree)
    {
        abort_if(Gate::denies('item_group_three_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemGroupThree->delete();

        return back();
    }

    public function massDestroy(MassDestroyItemGroupThreeRequest $request)
    {
        ItemGroupThree::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
