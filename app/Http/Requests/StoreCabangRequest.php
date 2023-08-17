<?php

namespace App\Http\Requests;

use App\Models\Cabang;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCabangRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('cabang_create');
    }

    public function rules()
    {
        return [
            'kode' => [
                'string',
                'required',
                'unique:cabangs',
            ],
            'nama' => [
                'string',
                'required',
            ],
            'nama_perusahaan_cabang' => [
                'string',
                'nullable',
            ],
            'alamat' => [
                'string',
                'nullable',
            ],
            'telephone' => [
                'string',
                'nullable',
            ],
            'fax' => [
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
        ];
    }
}
