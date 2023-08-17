<?php

namespace App\Http\Requests;

use App\Models\PeriodeRekuring;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePeriodeRekuringRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('periode_rekuring_edit');
    }

    public function rules()
    {
        return [
            'kode' => [
                'string',
                'required',
            ],
            'keterangan' => [
                'string',
                'required',
            ],
            'faktor_pengali' => [
                'required',
            ],
            'nilai_pengali' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
