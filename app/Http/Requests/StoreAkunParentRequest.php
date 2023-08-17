<?php

namespace App\Http\Requests;

use App\Models\AkunParent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAkunParentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('akun_parent_create');
    }

    public function rules()
    {
        return [
            'kode' => [
                'string',
                'required',
                'unique:akun_parents',
            ],
            'nama' => [
                'string',
                'required',
            ],
        ];
    }
}
