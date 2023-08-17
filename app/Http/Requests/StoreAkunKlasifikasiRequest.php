<?php

namespace App\Http\Requests;

use App\Models\AkunKlasifikasi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAkunKlasifikasiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('akun_klasifikasi_create');
    }

    public function rules()
    {
        return [
            'kode' => [
                'string',
                'required',
                'unique:akun_klasifikasis',
            ],
            'nama' => [
                'string',
                'required',
            ],
        ];
    }
}
