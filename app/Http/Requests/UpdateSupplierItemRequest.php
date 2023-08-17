<?php

namespace App\Http\Requests;

use App\Models\SupplierItem;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSupplierItemRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('supplier_item_edit');
    }

    public function rules()
    {
        return [
            'supplier_utamas.*' => [
                'integer',
            ],
            'supplier_utamas' => [
                'array',
            ],
            'kode_barang_supplier' => [
                'string',
                'nullable',
            ],
            'lama_pemesanan' => [
                'string',
                'nullable',
            ],
        ];
    }
}
