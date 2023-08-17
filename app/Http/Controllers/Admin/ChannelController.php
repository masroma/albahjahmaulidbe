<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyChannelRequest;
use App\Http\Requests\StoreChannelRequest;
use App\Http\Requests\UpdateChannelRequest;
use App\Models\Channel;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ChannelController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('channel_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Channel::query()->select(sprintf('%s.*', (new Channel())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'channel_show';
                $editGate = 'channel_edit';
                $deleteGate = 'channel_delete';
                $crudRoutePart = 'channels';

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
            $table->editColumn('warna', function ($row) {
                return $row->warna ? $row->warna : '';
            });
            $table->editColumn('aktif', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->aktif ? 'checked' : null) . '>';
            });
            $table->editColumn('tampil_di_pos', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->tampil_di_pos ? 'checked' : null) . '>';
            });

            $table->rawColumns(['actions', 'placeholder', 'aktif', 'tampil_di_pos']);

            return $table->make(true);
        }

        return view('admin.channels.index');
    }

    public function create()
    {
        abort_if(Gate::denies('channel_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.channels.create');
    }

    public function store(StoreChannelRequest $request)
    {
        $channel = Channel::create($request->all());

        return redirect()->route('admin.channels.index');
    }

    public function edit(Channel $channel)
    {
        abort_if(Gate::denies('channel_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.channels.edit', compact('channel'));
    }

    public function update(UpdateChannelRequest $request, Channel $channel)
    {
        $channel->update($request->all());

        return redirect()->route('admin.channels.index');
    }

    public function show(Channel $channel)
    {
        abort_if(Gate::denies('channel_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.channels.show', compact('channel'));
    }

    public function destroy(Channel $channel)
    {
        abort_if(Gate::denies('channel_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $channel->delete();

        return back();
    }

    public function massDestroy(MassDestroyChannelRequest $request)
    {
        Channel::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
