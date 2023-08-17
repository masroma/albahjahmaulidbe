<?php

namespace App\Http\Requests;

use App\Models\Pajak;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePajakRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pajak_edit');
    }

    public function rules()
    {
        return [
            'kode' => [
                'string',
                'required',
                'unique:pajaks,kode,' . request()->route('pajak')->id,
            ],
            'nama_pajak' => [
                'string',
                'required',
            ],
            'presentasi_npwp' => [
                'string',
                'required',
            ],
            'presentasi_non_npwp' => [
                'string',
                'nullable',
            ],
        ];
    }
}
