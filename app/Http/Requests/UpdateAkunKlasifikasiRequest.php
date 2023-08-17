<?php

namespace App\Http\Requests;

use App\Models\AkunKlasifikasi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAkunKlasifikasiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('akun_klasifikasi_edit');
    }

    public function rules()
    {
        return [
            'kode' => [
                'string',
                'required',
                'unique:akun_klasifikasis,kode,' . request()->route('akun_klasifikasi')->id,
            ],
            'nama' => [
                'string',
                'required',
            ],
        ];
    }
}
