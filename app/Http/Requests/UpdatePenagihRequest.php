<?php

namespace App\Http\Requests;

use App\Models\Penagih;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePenagihRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('penagih_edit');
    }

    public function rules()
    {
        return [
            'kode' => [
                'string',
                'required',
                'unique:penagihs,kode,' . request()->route('penagih')->id,
            ],
            'nama_penagih' => [
                'string',
                'required',
            ],
            'alamat' => [
                'string',
                'required',
            ],
            'kode_pos' => [
                'string',
                'nullable',
            ],
            'telephone' => [
                'string',
                'nullable',
            ],
            'handphone' => [
                'string',
                'required',
            ],
        ];
    }
}
