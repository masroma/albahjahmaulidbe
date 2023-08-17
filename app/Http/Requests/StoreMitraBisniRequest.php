<?php

namespace App\Http\Requests;

use App\Models\MitraBisni;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMitraBisniRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mitra_bisni_create');
    }

    public function rules()
    {
        return [
            'kode' => [
                'string',
                'required',
            ],
            'nama' => [
                'string',
                'required',
            ],
            'group_1s.*' => [
                'integer',
            ],
            'group_1s' => [
                'array',
            ],
            'group_2s.*' => [
                'integer',
            ],
            'group_2s' => [
                'array',
            ],
            'group_3s.*' => [
                'integer',
            ],
            'group_3s' => [
                'array',
            ],
            'level_hargas.*' => [
                'integer',
            ],
            'level_hargas' => [
                'array',
            ],
            'sales.*' => [
                'integer',
            ],
            'sales' => [
                'array',
            ],
            'bank' => [
                'string',
                'nullable',
            ],
            'no_rekening' => [
                'string',
                'nullable',
            ],
            'atas_nama' => [
                'string',
                'nullable',
            ],
            'npwp' => [
                'string',
                'nullable',
            ],
            'pkp' => [
                'string',
                'nullable',
            ],
            'tanggal_pkp' => [
                'string',
                'nullable',
            ],
            'no_nik' => [
                'string',
                'nullable',
            ],
            'atas_nama_nik' => [
                'string',
                'nullable',
            ],
        ];
    }
}
