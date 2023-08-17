<?php

namespace App\Http\Requests;

use App\Models\ItemGroupOne;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreItemGroupOneRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('item_group_one_create');
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
            'item_type' => [
                'required',
            ],
            'akun_retur_penjualan' => [
                'string',
                'nullable',
            ],
        ];
    }
}
