<?php

namespace App\Http\Requests;

use App\Models\StokItem;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStokItemRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('stok_item_edit');
    }

    public function rules()
    {
        return [
            'location' => [
                'string',
                'nullable',
            ],
            'qty' => [
                'string',
                'nullable',
            ],
            'pid' => [
                'string',
                'nullable',
            ],
            'hpp' => [
                'string',
                'nullable',
            ],
            'min' => [
                'string',
                'nullable',
            ],
            'max' => [
                'string',
                'nullable',
            ],
            're_order' => [
                'string',
                'nullable',
            ],
        ];
    }
}
