<?php

namespace App\Http\Requests;

use App\Models\Pajak;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPajakRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('pajak_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:pajaks,id',
        ];
    }
}
