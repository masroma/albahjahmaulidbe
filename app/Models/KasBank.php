<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KasBank extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'kas_banks';

    public const AKUN_SELECT = [

    ];

    public const MATA_UANG_SELECT = [

    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const TIPE_KAS_SELECT = [
        'bank' => 'Bank',
        'cash' => 'Cash',
    ];

    protected $fillable = [
        'kode',
        'tipe_kas',
        'akun',
        'nama',
        'mata_uang',
        'saldo',
        'tot_giro_keluar',
        'aktif',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
