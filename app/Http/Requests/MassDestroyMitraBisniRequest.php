<?php

namespace App\Http\Requests;

use App\Models\MitraBisni;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMitraBisniRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('mitra_bisni_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:mitra_bisnis,id',
        ];
    }
}
