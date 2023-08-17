<?php

namespace App\Http\Requests;

use App\Models\AlamatMitraBisni;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAlamatMitraBisniRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('alamat_mitra_bisni_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:alamat_mitra_bisnis,id',
        ];
    }
}
