<?php

namespace App\Http\Requests;

use App\Models\KontakMitraBisni;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreKontakMitraBisniRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('kontak_mitra_bisni_create');
    }

    public function rules()
    {
        return [
            'mitra_bisnis.*' => [
                'integer',
            ],
            'mitra_bisnis' => [
                'array',
            ],
            'nama_kontak' => [
                'string',
                'nullable',
            ],
            'jabatan' => [
                'string',
                'nullable',
            ],
            'handphone' => [
                'string',
                'nullable',
            ],
        ];
    }
}
