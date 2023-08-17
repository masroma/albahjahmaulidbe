<?php

namespace App\Http\Requests;

use App\Models\Proyek;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProyekRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('proyek_edit');
    }

    public function rules()
    {
        return [
            'kode' => [
                'string',
                'required',
                'unique:proyeks,kode,' . request()->route('proyek')->id,
            ],
            'nama' => [
                'string',
                'required',
            ],
        ];
    }
}
