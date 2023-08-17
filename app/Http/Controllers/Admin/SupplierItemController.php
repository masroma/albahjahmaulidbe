<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySupplierItemRequest;
use App\Http\Requests\StoreSupplierItemRequest;
use App\Http\Requests\UpdateSupplierItemRequest;
use App\Models\MitraBisni;
use App\Models\SupplierItem;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SupplierItemController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('supplier_item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = SupplierItem::with(['supplier_utamas'])->select(sprintf('%s.*', (new SupplierItem())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'supplier_item_show';
                $editGate = 'supplier_item_edit';
                $deleteGate = 'supplier_item_delete';
                $crudRoutePart = 'supplier-items';

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
            $table->editColumn('supplier_utama', function ($row) {
                $labels = [];
                foreach ($row->supplier_utamas as $supplier_utama) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $supplier_utama->nama);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('kode_barang_supplier', function ($row) {
                return $row->kode_barang_supplier ? $row->kode_barang_supplier : '';
            });
            $table->editColumn('lama_pemesanan', function ($row) {
                return $row->lama_pemesanan ? $row->lama_pemesanan : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'supplier_utama']);

            return $table->make(true);
        }

        return view('admin.supplierItems.index');
    }

    public function create()
    {
        abort_if(Gate::denies('supplier_item_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $supplier_utamas = MitraBisni::pluck('nama', 'id');

        return view('admin.supplierItems.create', compact('supplier_utamas'));
    }

    public function store(StoreSupplierItemRequest $request)
    {
        $supplierItem = SupplierItem::create($request->all());
        $supplierItem->supplier_utamas()->sync($request->input('supplier_utamas', []));

        return redirect()->route('admin.supplier-items.index');
    }

    public function edit(SupplierItem $supplierItem)
    {
        abort_if(Gate::denies('supplier_item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $supplier_utamas = MitraBisni::pluck('nama', 'id');

        $supplierItem->load('supplier_utamas');

        return view('admin.supplierItems.edit', compact('supplierItem', 'supplier_utamas'));
    }

    public function update(UpdateSupplierItemRequest $request, SupplierItem $supplierItem)
    {
        $supplierItem->update($request->all());
        $supplierItem->supplier_utamas()->sync($request->input('supplier_utamas', []));

        return redirect()->route('admin.supplier-items.index');
    }

    public function show(SupplierItem $supplierItem)
    {
        abort_if(Gate::denies('supplier_item_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $supplierItem->load('supplier_utamas');

        return view('admin.supplierItems.show', compact('supplierItem'));
    }

    public function destroy(SupplierItem $supplierItem)
    {
        abort_if(Gate::denies('supplier_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $supplierItem->delete();

        return back();
    }

    public function massDestroy(MassDestroySupplierItemRequest $request)
    {
        SupplierItem::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
