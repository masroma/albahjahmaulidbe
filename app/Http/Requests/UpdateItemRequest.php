<?php

namespace App\Http\Requests;

use App\Models\Item;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateItemRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('item_edit');
    }

    public function rules()
    {
        return [
            'item_kode' => [
                'string',
                'required',
                'unique:items,item_kode,' . request()->route('item')->id,
            ],
            'barcode' => [
                'string',
                'nullable',
            ],
            'item_nama' => [
                'string',
                'required',
            ],
            'item_alias_nama' => [
                'string',
                'nullable',
            ],
            'status' => [
                'required',
            ],
            'item_satuan_one' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'item_satuan_two' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'item_satuan_three' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'photo' => [
                'array',
            ],
            'satuans.*' => [
                'integer',
            ],
            'satuans' => [
                'array',
            ],
        ];
    }
}
