<?php

namespace App\Http\Requests;

use App\Models\HargaJualItem;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHargaJualItemRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('harga_jual_item_edit');
    }

    public function rules()
    {
        return [
            'item_id' => [
                'required',
                'integer',
            ],
            'level_harga_id' => [
                'required',
                'integer',
            ],
            'mata_uang_id' => [
                'required',
                'integer',
            ],
            'harga_satuan_1' => [
                'string',
                'nullable',
            ],
            'diskon_satuan_1' => [
                'string',
                'nullable',
            ],
            'harga_satuan_2' => [
                'string',
                'nullable',
            ],
            'diskon_satuan_2' => [
                'string',
                'nullable',
            ],
            'harga_satuan_3' => [
                'string',
                'nullable',
            ],
            'diskon_satuan_3' => [
                'string',
                'nullable',
            ],
        ];
    }
}
