<?php

namespace App\Http\Requests;

use App\Models\Penagih;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePenagihRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('penagih_create');
    }

    public function rules()
    {
        return [
            'kode' => [
                'string',
                'required',
                'unique:penagihs',
            ],
            'nama_penagih' => [
                'string',
                'required',
            ],
            'alamat' => [
                'string',
                'required',
            ],
            'kode_pos' => [
                'string',
                'nullable',
            ],
            'telephone' => [
                'string',
                'nullable',
            ],
            'handphone' => [
                'string',
                'required',
            ],
        ];
    }
}
