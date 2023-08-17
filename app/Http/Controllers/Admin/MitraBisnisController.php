<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyMitraBisniRequest;
use App\Http\Requests\StoreMitraBisniRequest;
use App\Http\Requests\UpdateMitraBisniRequest;
use App\Models\GrupMitraBisnisOne;
use App\Models\GrupMitraBisnisThree;
use App\Models\GrupMitraBisnisTwo;
use App\Models\LevelHarga;
use App\Models\MitraBisni;
use App\Models\Sale;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MitraBisnisController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('mitra_bisni_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = MitraBisni::with(['group_1s', 'group_2s', 'group_3s', 'level_hargas', 'sales'])->select(sprintf('%s.*', (new MitraBisni())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'mitra_bisni_show';
                $editGate = 'mitra_bisni_edit';
                $deleteGate = 'mitra_bisni_delete';
                $crudRoutePart = 'mitra-bisnis';

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
            $table->editColumn('deskripsi', function ($row) {
                return $row->deskripsi ? $row->deskripsi : '';
            });
            $table->editColumn('aktif', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->aktif ? 'checked' : null) . '>';
            });
            $table->editColumn('tipe_bisnis_customer', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->tipe_bisnis_customer ? 'checked' : null) . '>';
            });
            $table->editColumn('tipe_bisnis_supplier', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->tipe_bisnis_supplier ? 'checked' : null) . '>';
            });
            $table->editColumn('group_1', function ($row) {
                $labels = [];
                foreach ($row->group_1s as $group_1) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $group_1->kode);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('group_2', function ($row) {
                $labels = [];
                foreach ($row->group_2s as $group_2) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $group_2->kode);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('group_3', function ($row) {
                $labels = [];
                foreach ($row->group_3s as $group_3) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $group_3->kode);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('level_harga', function ($row) {
                $labels = [];
                foreach ($row->level_hargas as $level_harga) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $level_harga->keterangan);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('sales', function ($row) {
                $labels = [];
                foreach ($row->sales as $sale) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $sale->nama);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('bank', function ($row) {
                return $row->bank ? $row->bank : '';
            });
            $table->editColumn('no_rekening', function ($row) {
                return $row->no_rekening ? $row->no_rekening : '';
            });
            $table->editColumn('atas_nama', function ($row) {
                return $row->atas_nama ? $row->atas_nama : '';
            });
            $table->editColumn('npwp', function ($row) {
                return $row->npwp ? $row->npwp : '';
            });
            $table->editColumn('pkp', function ($row) {
                return $row->pkp ? $row->pkp : '';
            });
            $table->editColumn('tanggal_pkp', function ($row) {
                return $row->tanggal_pkp ? $row->tanggal_pkp : '';
            });
            $table->editColumn('no_nik', function ($row) {
                return $row->no_nik ? $row->no_nik : '';
            });
            $table->editColumn('atas_nama_nik', function ($row) {
                return $row->atas_nama_nik ? $row->atas_nama_nik : '';
            });
            $table->editColumn('pembelian_pajak', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->pembelian_pajak ? 'checked' : null) . '>';
            });
            $table->editColumn('penjualan_pajak', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->penjualan_pajak ? 'checked' : null) . '>';
            });
            $table->editColumn('image', function ($row) {
                return $row->image ? '<a href="' . $row->image->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'aktif', 'tipe_bisnis_customer', 'tipe_bisnis_supplier', 'group_1', 'group_2', 'group_3', 'level_harga', 'sales', 'pembelian_pajak', 'penjualan_pajak', 'image']);

            return $table->make(true);
        }

        return view('admin.mitraBisnis.index');
    }

    public function create()
    {
        abort_if(Gate::denies('mitra_bisni_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $group_1s = GrupMitraBisnisOne::pluck('kode', 'id');

        $group_2s = GrupMitraBisnisTwo::pluck('kode', 'id');

        $group_3s = GrupMitraBisnisThree::pluck('kode', 'id');

        $level_hargas = LevelHarga::pluck('keterangan', 'id');

        $sales = Sale::pluck('nama', 'id');

        return view('admin.mitraBisnis.create', compact('group_1s', 'group_2s', 'group_3s', 'level_hargas', 'sales'));
    }

    public function store(StoreMitraBisniRequest $request)
    {
        $mitraBisni = MitraBisni::create($request->all());
        $mitraBisni->group_1s()->sync($request->input('group_1s', []));
        $mitraBisni->group_2s()->sync($request->input('group_2s', []));
        $mitraBisni->group_3s()->sync($request->input('group_3s', []));
        $mitraBisni->level_hargas()->sync($request->input('level_hargas', []));
        $mitraBisni->sales()->sync($request->input('sales', []));
        if ($request->input('image', false)) {
            $mitraBisni->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $mitraBisni->id]);
        }

        return redirect()->route('admin.mitra-bisnis.index');
    }

    public function edit(MitraBisni $mitraBisni)
    {
        abort_if(Gate::denies('mitra_bisni_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $group_1s = GrupMitraBisnisOne::pluck('kode', 'id');

        $group_2s = GrupMitraBisnisTwo::pluck('kode', 'id');

        $group_3s = GrupMitraBisnisThree::pluck('kode', 'id');

        $level_hargas = LevelHarga::pluck('keterangan', 'id');

        $sales = Sale::pluck('nama', 'id');

        $mitraBisni->load('group_1s', 'group_2s', 'group_3s', 'level_hargas', 'sales');

        return view('admin.mitraBisnis.edit', compact('group_1s', 'group_2s', 'group_3s', 'level_hargas', 'mitraBisni', 'sales'));
    }

    public function update(UpdateMitraBisniRequest $request, MitraBisni $mitraBisni)
    {
        $mitraBisni->update($request->all());
        $mitraBisni->group_1s()->sync($request->input('group_1s', []));
        $mitraBisni->group_2s()->sync($request->input('group_2s', []));
        $mitraBisni->group_3s()->sync($request->input('group_3s', []));
        $mitraBisni->level_hargas()->sync($request->input('level_hargas', []));
        $mitraBisni->sales()->sync($request->input('sales', []));
        if ($request->input('image', false)) {
            if (!$mitraBisni->image || $request->input('image') !== $mitraBisni->image->file_name) {
                if ($mitraBisni->image) {
                    $mitraBisni->image->delete();
                }
                $mitraBisni->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($mitraBisni->image) {
            $mitraBisni->image->delete();
        }

        return redirect()->route('admin.mitra-bisnis.index');
    }

    public function show(MitraBisni $mitraBisni)
    {
        abort_if(Gate::denies('mitra_bisni_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mitraBisni->load('group_1s', 'group_2s', 'group_3s', 'level_hargas', 'sales');

        return view('admin.mitraBisnis.show', compact('mitraBisni'));
    }

    public function destroy(MitraBisni $mitraBisni)
    {
        abort_if(Gate::denies('mitra_bisni_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mitraBisni->delete();

        return back();
    }

    public function massDestroy(MassDestroyMitraBisniRequest $request)
    {
        MitraBisni::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('mitra_bisni_create') && Gate::denies('mitra_bisni_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new MitraBisni();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
