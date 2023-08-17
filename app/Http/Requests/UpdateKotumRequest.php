<?php

namespace App\Http\Requests;

use App\Models\Kotum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateKotumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('kotum_edit');
    }

    public function rules()
    {
        return [
            'code' => [
                'string',
                'required',
            ],
            'nama' => [
                'string',
                'required',
            ],
        ];
    }
}
