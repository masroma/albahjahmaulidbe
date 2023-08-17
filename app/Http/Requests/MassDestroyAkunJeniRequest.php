<?php

namespace App\Http\Requests;

use App\Models\AkunJeni;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAkunJeniRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('akun_jeni_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:akun_jenis,id',
        ];
    }
}
