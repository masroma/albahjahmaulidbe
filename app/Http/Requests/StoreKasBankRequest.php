<?php

namespace App\Http\Requests;

use App\Models\KasBank;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreKasBankRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('kas_bank_create');
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
            'mata_uang' => [
                'required',
            ],
            'saldo' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'tot_giro_keluar' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'akun' => [
                'required',
            ],
        ];
    }
}
