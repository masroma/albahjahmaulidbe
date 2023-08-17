<?php

namespace App\Http\Requests;

use App\Models\KontakMitraBisni;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyKontakMitraBisniRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('kontak_mitra_bisni_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:kontak_mitra_bisnis,id',
        ];
    }
}
