<?php

namespace App\Http\Requests;

use App\Models\MesinEdc;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMesinEdcRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('mesin_edc_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:mesin_edcs,id',
        ];
    }
}
