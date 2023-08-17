<?php

namespace App\Http\Requests;

use App\Models\Pabrik;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePabrikRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pabrik_edit');
    }

    public function rules()
    {
        return [
            'nama_pabrik' => [
                'string',
                'required',
            ],
        ];
    }
}
