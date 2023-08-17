<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SupplierItem extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'supplier_items';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'kode_barang_supplier',
        'lama_pemesanan',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function supplier_utamas()
    {
        return $this->belongsToMany(MitraBisni::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
