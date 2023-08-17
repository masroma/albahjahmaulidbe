<?php

namespace App\Http\Requests;

use App\Models\ItemGroupTwo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreItemGroupTwoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('item_group_two_create');
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
        ];
    }
}
