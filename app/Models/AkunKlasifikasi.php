<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AkunKlasifikasi extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'akun_klasifikasis';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'kode',
        'nama',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function akunKlasifikasiAkuns()
    {
        return $this->hasMany(Akun::class, 'akun_klasifikasi_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
