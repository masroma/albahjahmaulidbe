<?php

namespace App\Http\Requests;

use App\Models\MarkItem;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMarkItemRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mark_item_edit');
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
