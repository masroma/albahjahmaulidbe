<?php

namespace App\Http\Requests;

use App\Models\AlamatMitraBisni;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAlamatMitraBisniRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('alamat_mitra_bisni_create');
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
            'keterangan_alamat' => [
                'string',
                'nullable',
            ],
            'kotas.*' => [
                'integer',
            ],
            'kotas' => [
                'array',
            ],
            'telepon' => [
                'string',
                'nullable',
            ],
            'fax' => [
                'string',
                'nullable',
            ],
            'kode_pos' => [
                'string',
                'nullable',
            ],
        ];
    }
}
