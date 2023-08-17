<?php

namespace App\Http\Requests;

use App\Models\Sale;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSaleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sale_create');
    }

    public function rules()
    {
        return [
            'kode' => [
                'string',
                'required',
                'unique:sales',
            ],
            'nama' => [
                'string',
                'required',
            ],
            'alamat' => [
                'string',
                'required',
            ],
            'kode_pos' => [
                'string',
                'nullable',
            ],
            'telephone' => [
                'string',
                'nullable',
            ],
            'handphone' => [
                'string',
                'required',
            ],
        ];
    }
}
