<?php

namespace App\Http\Requests;

use App\Models\Penagih;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPenagihRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('penagih_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:penagihs,id',
        ];
    }
}
