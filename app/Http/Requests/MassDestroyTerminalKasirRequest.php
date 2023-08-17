<?php

namespace App\Http\Requests;

use App\Models\TerminalKasir;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTerminalKasirRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('terminal_kasir_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:terminal_kasirs,id',
        ];
    }
}
