<?php

namespace App\Http\Requests;

use App\Models\ItemGroupTwo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyItemGroupTwoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('item_group_two_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:item_group_twos,id',
        ];
    }
}
