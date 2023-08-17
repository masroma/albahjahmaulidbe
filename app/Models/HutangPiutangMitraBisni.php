<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HutangPiutangMitraBisni extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const PEMBELIAN_TERMIN_SELECT = [
        'Cash'   => 'Cash',
        'Credit' => 'Credit',
    ];

    public const PENJUALAN_TERMIN_SELECT = [
        'Cash'   => 'Cash',
        'Credit' => 'Credit',
    ];

    public $table = 'hutang_piutang_mitra_bisnis';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'pembelian_termin',
        'pembelian_tempo',
        'penjualan_termin',
        'penjualan_tempo',
        'batas_hutang',
        'batas_frekuensi_hutang',
        'batas_piutang',
        'batas_frekuensi_piutang',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function mitra_bisnis()
    {
        return $this->belongsToMany(MitraBisni::class);
    }

    public function mata_uangs()
    {
        return $this->belongsToMany(MataUang::class);
    }

    public function akun_hutangs()
    {
        return $this->belongsToMany(Akun::class);
    }

    public function akun_stakeholder_piutangs()
    {
        return $this->belongsToMany(AkunParent::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
