<?php

namespace App\Http\Requests;

use App\Models\HutangPiutangMitraBisni;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHutangPiutangMitraBisniRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('hutang_piutang_mitra_bisni_edit');
    }

    public function rules()
    {
        return [
            'mitra_bisnis.*' => [
                'integer',
            ],
            'mitra_bisnis' => [
                'array',
            ],
            'mata_uangs.*' => [
                'integer',
            ],
            'mata_uangs' => [
                'array',
            ],
            'pembelian_tempo' => [
                'string',
                'nullable',
            ],
            'penjualan_tempo' => [
                'string',
                'nullable',
            ],
            'batas_hutang' => [
                'string',
                'nullable',
            ],
            'batas_frekuensi_hutang' => [
                'string',
                'nullable',
            ],
            'akun_hutangs.*' => [
                'integer',
            ],
            'akun_hutangs' => [
                'array',
            ],
            'batas_piutang' => [
                'string',
                'nullable',
            ],
            'batas_frekuensi_piutang' => [
                'string',
                'nullable',
            ],
            'akun_stakeholder_piutangs.*' => [
                'integer',
            ],
            'akun_stakeholder_piutangs' => [
                'array',
            ],
        ];
    }
}
