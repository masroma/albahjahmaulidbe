<?php

namespace App\Http\Requests;

use App\Models\Channel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateChannelRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('channel_edit');
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
            'warna' => [
                'string',
                'nullable',
            ],
        ];
    }
}
