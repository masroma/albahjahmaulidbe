<?php

namespace App\Http\Requests;

use App\Models\Satuan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSatuanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('satuan_create');
    }

    public function rules()
    {
        return [
            'satuan_1' => [
                'string',
                'nullable',
            ],
            'satuan_2' => [
                'string',
                'nullable',
            ],
            'isi_2' => [
                'string',
                'nullable',
            ],
            'satuan_3' => [
                'string',
                'nullable',
            ],
            'isi_3' => [
                'string',
                'nullable',
            ],
            'satuan_pembelian' => [
                'string',
                'nullable',
            ],
            'satuan_penjualan' => [
                'string',
                'nullable',
            ],
            'satuan_stok' => [
                'string',
                'nullable',
            ],
        ];
    }
}
