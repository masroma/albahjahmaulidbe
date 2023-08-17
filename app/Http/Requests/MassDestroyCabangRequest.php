<?php

namespace App\Http\Requests;

use App\Models\Cabang;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCabangRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('cabang_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:cabangs,id',
        ];
    }
}
