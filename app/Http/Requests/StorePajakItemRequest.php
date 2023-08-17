<?php

namespace App\Http\Requests;

use App\Models\PajakItem;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePajakItemRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pajak_item_create');
    }

    public function rules()
    {
        return [
            'item_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
