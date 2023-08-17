<?php

namespace App\Http\Requests;

use App\Models\Kotum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyKotumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('kotum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:kota,id',
        ];
    }
}
