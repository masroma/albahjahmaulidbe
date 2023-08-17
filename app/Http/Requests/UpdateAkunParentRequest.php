<?php

namespace App\Http\Requests;

use App\Models\AkunParent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAkunParentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('akun_parent_edit');
    }

    public function rules()
    {
        return [
            'kode' => [
                'string',
                'required',
                'unique:akun_parents,kode,' . request()->route('akun_parent')->id,
            ],
            'nama' => [
                'string',
                'required',
            ],
        ];
    }
}
