<?php

namespace App\Http\Requests;

use App\Models\GrupMitraBisnisOne;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateGrupMitraBisnisOneRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('grup_mitra_bisnis_one_edit');
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
