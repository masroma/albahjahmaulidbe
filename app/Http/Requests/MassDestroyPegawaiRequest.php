<?php

namespace App\Http\Requests;

use App\Models\Pegawai;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPegawaiRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('pegawai_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:pegawais,id',
        ];
    }
}
