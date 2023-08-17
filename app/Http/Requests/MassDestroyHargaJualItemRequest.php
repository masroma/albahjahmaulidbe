<?php

namespace App\Http\Requests;

use App\Models\HargaJualItem;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyHargaJualItemRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('harga_jual_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:harga_jual_items,id',
        ];
    }
}
