<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penagih extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'penagihs';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'kode',
        'nama_penagih',
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

    public function kode_kota()
    {
        return $this->belongsTo(Kotum::class, 'kode_kota_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
