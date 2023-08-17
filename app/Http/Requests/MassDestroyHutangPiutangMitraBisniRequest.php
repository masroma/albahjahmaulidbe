<?php

namespace App\Http\Requests;

use App\Models\HutangPiutangMitraBisni;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyHutangPiutangMitraBisniRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('hutang_piutang_mitra_bisni_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:hutang_piutang_mitra_bisnis,id',
        ];
    }
}
