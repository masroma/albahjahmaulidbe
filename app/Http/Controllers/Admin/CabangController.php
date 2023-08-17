<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCabangRequest;
use App\Http\Requests\StoreCabangRequest;
use App\Http\Requests\UpdateCabangRequest;
use App\Models\Cabang;
use App\Models\Test;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CabangController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('cabang_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Cabang::with(['default_customer'])->select(sprintf('%s.*', (new Cabang)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'cabang_show';
                $editGate      = 'cabang_edit';
                $deleteGate    = 'cabang_delete';
                $crudRoutePart = 'cabangs';

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

        return view('admin.cabangs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('cabang_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $default_customers = Test::pluck('test', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.cabangs.create', compact('default_customers'));
    }

    public function store(StoreCabangRequest $request)
    {
        $cabang = Cabang::create($request->all());

        if ($request->input('logo_cabang', false)) {
            $cabang->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo_cabang'))))->toMediaCollection('logo_cabang');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $cabang->id]);
        }

        return redirect()->route('admin.cabangs.index');
    }

    public function edit(Cabang $cabang)
    {
        abort_if(Gate::denies('cabang_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $default_customers = Test::pluck('test', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cabang->load('default_customer');

        return view('admin.cabangs.edit', compact('cabang', 'default_customers'));
    }

    public function update(UpdateCabangRequest $request, Cabang $cabang)
    {
        $cabang->update($request->all());

        if ($request->input('logo_cabang', false)) {
            if (! $cabang->logo_cabang || $request->input('logo_cabang') !== $cabang->logo_cabang->file_name) {
                if ($cabang->logo_cabang) {
                    $cabang->logo_cabang->delete();
                }
                $cabang->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo_cabang'))))->toMediaCollection('logo_cabang');
            }
        } elseif ($cabang->logo_cabang) {
            $cabang->logo_cabang->delete();
        }

        return redirect()->route('admin.cabangs.index');
    }

    public function show(Cabang $cabang)
    {
        abort_if(Gate::denies('cabang_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cabang->load('default_customer');

        return view('admin.cabangs.show', compact('cabang'));
    }

    public function destroy(Cabang $cabang)
    {
        abort_if(Gate::denies('cabang_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cabang->delete();

        return back();
    }

    public function massDestroy(MassDestroyCabangRequest $request)
    {
        $cabangs = Cabang::find(request('ids'));

        foreach ($cabangs as $cabang) {
            $cabang->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('cabang_create') && Gate::denies('cabang_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Cabang();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
