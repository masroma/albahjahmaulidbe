<?php

namespace App\Http\Requests;

use App\Models\Gudang;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyGudangRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('gudang_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:gudangs,id',
        ];
    }
}
