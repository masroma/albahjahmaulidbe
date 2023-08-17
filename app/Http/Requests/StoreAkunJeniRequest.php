<?php

namespace App\Http\Requests;

use App\Models\AkunJeni;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAkunJeniRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('akun_jeni_create');
    }

    public function rules()
    {
        return [
            'kode' => [
                'string',
                'required',
                'unique:akun_jenis',
            ],
            'nama' => [
                'string',
                'required',
            ],
        ];
    }
}
