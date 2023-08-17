<?php

namespace App\Http\Requests;

use App\Models\GrupMitraBisnisTwo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateGrupMitraBisnisTwoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('grup_mitra_bisnis_two_edit');
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
        ];
    }
}
