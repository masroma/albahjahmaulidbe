<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMarkItemRequest;
use App\Http\Requests\StoreMarkItemRequest;
use App\Http\Requests\UpdateMarkItemRequest;
use App\Models\MarkItem;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MarkItemController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('mark_item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = MarkItem::query()->select(sprintf('%s.*', (new MarkItem())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'mark_item_show';
                $editGate = 'mark_item_edit';
                $deleteGate = 'mark_item_delete';
                $crudRoutePart = 'mark-items';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
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

        return view('admin.markItems.index');
    }

    public function create()
    {
        abort_if(Gate::denies('mark_item_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.markItems.create');
    }

    public function store(StoreMarkItemRequest $request)
    {
        $markItem = MarkItem::create($request->all());

        return redirect()->route('admin.mark-items.index');
    }

    public function edit(MarkItem $markItem)
    {
        abort_if(Gate::denies('mark_item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.markItems.edit', compact('markItem'));
    }

    public function update(UpdateMarkItemRequest $request, MarkItem $markItem)
    {
        $markItem->update($request->all());

        return redirect()->route('admin.mark-items.index');
    }

    public function show(MarkItem $markItem)
    {
        abort_if(Gate::denies('mark_item_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $markItem->load('itemMerkItems');

        return view('admin.markItems.show', compact('markItem'));
    }

    public function destroy(MarkItem $markItem)
    {
        abort_if(Gate::denies('mark_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $markItem->delete();

        return back();
    }

    public function massDestroy(MassDestroyMarkItemRequest $request)
    {
        MarkItem::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
