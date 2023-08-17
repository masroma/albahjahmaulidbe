<?php

namespace App\Http\Requests;

use App\Models\MarkItem;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMarkItemRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mark_item_create');
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
