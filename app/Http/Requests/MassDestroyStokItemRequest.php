<?php

namespace App\Http\Requests;

use App\Models\StokItem;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyStokItemRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('stok_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:stok_items,id',
        ];
    }
}
