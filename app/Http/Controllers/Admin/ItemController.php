<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyItemRequest;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Akun;
use App\Models\Item;
use App\Models\ItemGroupOne;
use App\Models\ItemGroupThree;
use App\Models\ItemGroupTwo;
use App\Models\MarkItem;
use App\Models\Satuan;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ItemController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Item::with(['item_merk', 'item_group_one', 'item_group_two', 'item_group_three', 'item_akun_pembelian', 'item_akun_hpp', 'item_akun_penjualan', 'item_akun_return_penjualan', 'satuans'])->select(sprintf('%s.*', (new Item)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'item_show';
                $editGate      = 'item_edit';
                $deleteGate    = 'item_delete';
                $crudRoutePart = 'items';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('item_kode', function ($row) {
                return $row->item_kode ? $row->item_kode : '';
            });
            $table->editColumn('item_nama', function ($row) {
                return $row->item_nama ? $row->item_nama : '';
            });
            $table->editColumn('barcode', function ($row) {
                return $row->barcode ? $row->barcode : '';
            });
            $table->addColumn('item_merk_nama', function ($row) {
                return $row->item_merk ? $row->item_merk->nama : '';
            });

            $table->addColumn('item_group_one_nama', function ($row) {
                return $row->item_group_one ? $row->item_group_one->nama : '';
            });

            $table->editColumn('item_akun_aktif', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->item_akun_aktif ? 'checked' : null) . '>';
            });

            $table->rawColumns(['actions', 'placeholder', 'item_merk', 'item_group_one', 'item_akun_aktif']);

            return $table->make(true);
        }

        $mark_items        = MarkItem::get();
        $item_group_ones   = ItemGroupOne::get();
        $item_group_twos   = ItemGroupTwo::get();
        $item_group_threes = ItemGroupThree::get();
        $akuns             = Akun::get();
        $satuans           = Satuan::get();

        return view('admin.items.index', compact('mark_items', 'item_group_ones', 'item_group_twos', 'item_group_threes', 'akuns', 'satuans'));
    }

    public function create()
    {
        abort_if(Gate::denies('item_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $item_merks = MarkItem::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $item_group_ones = ItemGroupOne::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $item_group_twos = ItemGroupTwo::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $item_group_threes = ItemGroupThree::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $item_akun_pembelians = Akun::pluck('akun_nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $item_akun_hpps = Akun::pluck('akun_nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $item_akun_penjualans = Akun::pluck('akun_nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $item_akun_return_penjualans = Akun::pluck('akun_nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $satuans = Satuan::pluck('satuan_1', 'id');

        return view('admin.items.create', compact('item_akun_hpps', 'item_akun_pembelians', 'item_akun_penjualans', 'item_akun_return_penjualans', 'item_group_ones', 'item_group_threes', 'item_group_twos', 'item_merks', 'satuans'));
    }

    public function store(StoreItemRequest $request)
    {
        $item = Item::create($request->all());
        $item->satuans()->sync($request->input('satuans', []));
        foreach ($request->input('photo', []) as $file) {
            $item->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $item->id]);
        }

        return redirect()->route('admin.items.index');
    }

    public function edit(Item $item)
    {
        abort_if(Gate::denies('item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $item_merks = MarkItem::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $item_group_ones = ItemGroupOne::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $item_group_twos = ItemGroupTwo::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $item_group_threes = ItemGroupThree::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $item_akun_pembelians = Akun::pluck('akun_nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $item_akun_hpps = Akun::pluck('akun_nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $item_akun_penjualans = Akun::pluck('akun_nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $item_akun_return_penjualans = Akun::pluck('akun_nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $satuans = Satuan::pluck('satuan_1', 'id');

        $item->load('item_merk', 'item_group_one', 'item_group_two', 'item_group_three', 'item_akun_pembelian', 'item_akun_hpp', 'item_akun_penjualan', 'item_akun_return_penjualan', 'satuans');

        return view('admin.items.edit', compact('item', 'item_akun_hpps', 'item_akun_pembelians', 'item_akun_penjualans', 'item_akun_return_penjualans', 'item_group_ones', 'item_group_threes', 'item_group_twos', 'item_merks', 'satuans'));
    }

    public function update(UpdateItemRequest $request, Item $item)
    {
        $item->update($request->all());
        $item->satuans()->sync($request->input('satuans', []));
        if (count($item->photo) > 0) {
            foreach ($item->photo as $media) {
                if (! in_array($media->file_name, $request->input('photo', []))) {
                    $media->delete();
                }
            }
        }
        $media = $item->photo->pluck('file_name')->toArray();
        foreach ($request->input('photo', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $item->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
            }
        }

        return redirect()->route('admin.items.index');
    }

    public function show(Item $item)
    {
        abort_if(Gate::denies('item_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $item->load('item_merk', 'item_group_one', 'item_group_two', 'item_group_three', 'item_akun_pembelian', 'item_akun_hpp', 'item_akun_penjualan', 'item_akun_return_penjualan', 'satuans');

        return view('admin.items.show', compact('item'));
    }

    public function destroy(Item $item)
    {
        abort_if(Gate::denies('item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $item->delete();

        return back();
    }

    public function massDestroy(MassDestroyItemRequest $request)
    {
        $items = Item::find(request('ids'));

        foreach ($items as $item) {
            $item->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('item_create') && Gate::denies('item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Item();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
