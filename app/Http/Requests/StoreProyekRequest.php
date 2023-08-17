<?php

namespace App\Http\Requests;

use App\Models\Proyek;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProyekRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('proyek_create');
    }

    public function rules()
    {
        return [
            'kode' => [
                'string',
                'required',
                'unique:proyeks',
            ],
            'nama' => [
                'string',
                'required',
            ],
        ];
    }
}
