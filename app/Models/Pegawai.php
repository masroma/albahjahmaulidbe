<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'pegawais';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'kode',
        'nama',
        'alamat',
        'kode_kota_id',
        'kode_pos',
        'telephone',
        'handphone',
        'email',
        'aktif',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function kode_kota()
    {
        return $this->belongsTo(Kotum::class, 'kode_kota_id');
    }
}
