<?php

namespace App\Http\Requests;

use App\Models\Pegawai;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePegawaiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pegawai_create');
    }

    public function rules()
    {
        return [
            'kode' => [
                'string',
                'required',
                'unique:pegawais',
            ],
            'nama' => [
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
