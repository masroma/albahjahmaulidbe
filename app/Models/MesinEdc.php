<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MesinEdc extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const BANK_SELECT = [
    ];

    public const CABANG_SELECT = [
    ];

    public $table = 'mesin_edcs';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'kode_edc',
        'nama_edc',
        'bank',
        'cabang',
        'keterangan',
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
