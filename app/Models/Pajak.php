<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pajak extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'pajaks';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'kode',
        'nama_pajak',
        'akun_pembelian_id',
        'akun_penjualan_id',
        'presentasi_npwp',
        'presentasi_non_npwp',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function akun_pembelian()
    {
        return $this->belongsTo(Akun::class, 'akun_pembelian_id');
    }

    public function akun_penjualan()
    {
        return $this->belongsTo(Akun::class, 'akun_penjualan_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
