<?php

namespace App\Http\Requests;

use App\Models\TipeKartuKredit;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTipeKartuKreditRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tipe_kartu_kredit_edit');
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
