<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KontakMitraBisni extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'kontak_mitra_bisnis';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nama_kontak',
        'jabatan',
        'handphone',
        'email',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function mitra_bisnis()
    {
        return $this->belongsToMany(MitraBisni::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
