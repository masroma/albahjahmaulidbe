<?php

namespace App\Http\Requests;

use App\Models\ItemGroupThree;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreItemGroupThreeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('item_group_three_create');
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
