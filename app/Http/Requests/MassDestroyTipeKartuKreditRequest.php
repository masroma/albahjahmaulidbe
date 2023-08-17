<?php

namespace App\Http\Requests;

use App\Models\TipeKartuKredit;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTipeKartuKreditRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tipe_kartu_kredit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tipe_kartu_kredits,id',
        ];
    }
}
