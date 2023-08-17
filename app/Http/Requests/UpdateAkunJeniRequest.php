<?php

namespace App\Http\Requests;

use App\Models\AkunJeni;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAkunJeniRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('akun_jeni_edit');
    }

    public function rules()
    {
        return [
            'kode' => [
                'string',
                'required',
                'unique:akun_jenis,kode,' . request()->route('akun_jeni')->id,
            ],
            'nama' => [
                'string',
                'required',
            ],
        ];
    }
}
