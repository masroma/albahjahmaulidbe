<?php

namespace App\Http\Requests;

use App\Models\Gudang;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreGudangRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('gudang_create');
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
