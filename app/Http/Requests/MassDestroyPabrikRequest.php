<?php

namespace App\Http\Requests;

use App\Models\Pabrik;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPabrikRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('pabrik_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:pabriks,id',
        ];
    }
}
