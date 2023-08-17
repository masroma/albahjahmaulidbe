<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyItemGroupTwoRequest;
use App\Http\Requests\StoreItemGroupTwoRequest;
use App\Http\Requests\UpdateItemGroupTwoRequest;
use App\Models\ItemGroupTwo;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ItemGroupTwoController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('item_group_two_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ItemGroupTwo::query()->select(sprintf('%s.*', (new ItemGroupTwo())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'item_group_two_show';
                $editGate = 'item_group_two_edit';
                $deleteGate = 'item_group_two_delete';
                $crudRoutePart = 'item-group-twos';

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

        return view('admin.itemGroupTwos.index');
    }

    public function create()
    {
        abort_if(Gate::denies('item_group_two_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.itemGroupTwos.create');
    }

    public function store(StoreItemGroupTwoRequest $request)
    {
        $itemGroupTwo = ItemGroupTwo::create($request->all());

        return redirect()->route('admin.item-group-twos.index');
    }

    public function edit(ItemGroupTwo $itemGroupTwo)
    {
        abort_if(Gate::denies('item_group_two_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.itemGroupTwos.edit', compact('itemGroupTwo'));
    }

    public function update(UpdateItemGroupTwoRequest $request, ItemGroupTwo $itemGroupTwo)
    {
        $itemGroupTwo->update($request->all());

        return redirect()->route('admin.item-group-twos.index');
    }

    public function show(ItemGroupTwo $itemGroupTwo)
    {
        abort_if(Gate::denies('item_group_two_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemGroupTwo->load('itemGroupTwoItems');

        return view('admin.itemGroupTwos.show', compact('itemGroupTwo'));
    }

    public function destroy(ItemGroupTwo $itemGroupTwo)
    {
        abort_if(Gate::denies('item_group_two_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemGroupTwo->delete();

        return back();
    }

    public function massDestroy(MassDestroyItemGroupTwoRequest $request)
    {
        ItemGroupTwo::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
