<?php

namespace App\Http\Requests;

use App\Models\GrupMitraBisnisThree;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyGrupMitraBisnisThreeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('grup_mitra_bisnis_three_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:grup_mitra_bisnis_threes,id',
        ];
    }
}
