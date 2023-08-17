<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AlamatMitraBisni extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'alamat_mitra_bisnis';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'keterangan_alamat',
        'alamat_lengkap',
        'telepon',
        'fax',
        'kode_pos',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function mitra_bisnis()
    {
        return $this->belongsToMany(MitraBisni::class);
    }

    public function kotas()
    {
        return $this->belongsToMany(Kotum::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
