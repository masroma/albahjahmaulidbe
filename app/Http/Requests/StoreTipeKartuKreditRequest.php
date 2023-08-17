<?php

namespace App\Http\Requests;

use App\Models\TipeKartuKredit;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTipeKartuKreditRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tipe_kartu_kredit_create');
    }

    public function rules()
    {
        return [
            'kode' => [
                'string',
                'required',
            ],
            'nama_kartu_kredit' => [
                'string',
                'required',
            ],
        ];
    }
}
