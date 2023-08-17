<?php

namespace App\Http\Requests;

use App\Models\PajakItem;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePajakItemRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pajak_item_edit');
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
