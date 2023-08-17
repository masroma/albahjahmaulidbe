<?php

namespace App\Http\Requests;

use App\Models\MesinEdc;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMesinEdcRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mesin_edc_edit');
    }

    public function rules()
    {
        return [
            'kode_edc' => [
                'string',
                'required',
            ],
            'nama_edc' => [
                'string',
                'required',
            ],
        ];
    }
}
