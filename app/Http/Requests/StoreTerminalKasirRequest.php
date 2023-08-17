<?php

namespace App\Http\Requests;

use App\Models\TerminalKasir;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTerminalKasirRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('terminal_kasir_create');
    }

    public function rules()
    {
        return [
            'kode_pos' => [
                'string',
                'required',
            ],
            'nama' => [
                'string',
                'required',
            ],
        ];
    }
}
