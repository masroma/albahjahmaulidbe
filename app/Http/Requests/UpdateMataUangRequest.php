<?php

namespace App\Http\Requests;

use App\Models\MataUang;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMataUangRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mata_uang_edit');
    }

    public function rules()
    {
        return [
            'kode' => [
                'string',
                'required',
                'unique:mata_uangs,kode,' . request()->route('mata_uang')->id,
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
