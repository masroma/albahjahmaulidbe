<?php

namespace App\Http\Requests;

use App\Models\Akun;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAkunRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('akun_edit');
    }

    public function rules()
    {
        return [
            'akun_kode' => [
                'string',
                'required',
                'unique:akuns,akun_kode,' . request()->route('akun')->id,
            ],
            'akun_nama' => [
                'string',
                'required',
            ],
            'akun_parent_id' => [
                'required',
                'integer',
            ],
            'akun_jenis_id' => [
                'required',
                'integer',
            ],
            'akun_klasifikasi_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
