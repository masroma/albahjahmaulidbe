<?php

namespace App\Http\Requests;

use App\Models\MataUang;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMataUangRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mata_uang_create');
    }

    public function rules()
    {
        return [
            'kode' => [
                'string',
                'required',
                'unique:mata_uangs',
            ],
            'mata_uang' => [
                'string',
                'required',
            ],
            'simbol' => [
                'string',
                'required',
            ],
            'kurs' => [
                'string',
                'nullable',
            ],
            'fiskal' => [
                'string',
                'nullable',
            ],
        ];
    }
}
