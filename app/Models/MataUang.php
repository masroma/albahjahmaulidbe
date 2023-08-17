<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MataUang extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'mata_uangs';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const RATE_TYPE_SELECT = [
        'N' => 'Normal',
        'R' => 'Reverse',
    ];

    protected $fillable = [
        'kode',
        'mata_uang',
        'simbol',
        'kurs',
        'fiskal',
        'rate_type',
        'default',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
