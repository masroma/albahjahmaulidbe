<?php

namespace App\Http\Requests;

use App\Models\ItemGroupOne;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyItemGroupOneRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('item_group_one_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:item_group_ones,id',
        ];
    }
}
