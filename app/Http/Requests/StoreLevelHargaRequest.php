<?php

namespace App\Http\Requests;

use App\Models\LevelHarga;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLevelHargaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('level_harga_create');
    }

    public function rules()
    {
        return [
            'code' => [
                'string',
                'required',
            ],
            'keterangan' => [
                'string',
                'required',
            ],
        ];
    }
}
