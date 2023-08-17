<?php

namespace App\Http\Requests;

use App\Models\Transaksi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTransaksiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('transaksi_create');
    }

    public function rules()
    {
        return [
            'invoice' => [
                'string',
                'nullable',
            ],
        ];
    }
}
