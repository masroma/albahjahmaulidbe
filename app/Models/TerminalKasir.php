<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TerminalKasir extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const CABANG_SELECT = [
    ];

    public const GUDANG_SELECT = [
    ];

    public const KAS_KASIR_SELECT = [
    ];

    public const KAS_SETOR_SELECT = [
    ];

    public $table = 'terminal_kasirs';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'kode_pos',
        'nama',
        'cabang',
        'gudang',
        'kas_kasir',
        'kas_setor',
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
