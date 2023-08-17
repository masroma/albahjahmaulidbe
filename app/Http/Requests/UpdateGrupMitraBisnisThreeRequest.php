<?php

namespace App\Http\Requests;

use App\Models\GrupMitraBisnisThree;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateGrupMitraBisnisThreeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('grup_mitra_bisnis_three_edit');
    }

    public function rules()
    {
        return [
            'kode' => [
                'string',
                'required',
            ],
            'keterangan' => [
                'string',
                'nullable',
            ],
            'level' => [
                'string',
                'nullable',
            ],
        ];
    }
}
