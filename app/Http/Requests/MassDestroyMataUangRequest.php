<?php

namespace App\Http\Requests;

use App\Models\MataUang;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMataUangRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('mata_uang_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:mata_uangs,id',
        ];
    }
}
