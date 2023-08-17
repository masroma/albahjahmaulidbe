<?php

namespace App\Http\Requests;

use App\Models\PeriodeRekuring;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPeriodeRekuringRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('periode_rekuring_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:periode_rekurings,id',
        ];
    }
}
