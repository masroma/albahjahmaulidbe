<?php

namespace App\Http\Requests;

use App\Models\AlamatMitraBisni;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAlamatMitraBisniRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('alamat_mitra_bisni_edit');
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
