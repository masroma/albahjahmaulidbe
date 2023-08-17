<?php

namespace App\Http\Requests;

use App\Models\Departement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDepartementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('departement_create');
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
            'keterangan' => [
                'string',
                'nullable',
            ],
        ];
    }
}
