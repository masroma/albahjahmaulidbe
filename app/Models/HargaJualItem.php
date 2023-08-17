<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HargaJualItem extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'harga_jual_items';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'item_id',
        'level_harga_id',
        'mata_uang_id',
        'harga_satuan_1',
        'diskon_satuan_1',
        'harga_satuan_2',
        'diskon_satuan_2',
        'harga_satuan_3',
        'diskon_satuan_3',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function level_harga()
    {
        return $this->belongsTo(LevelHarga::class, 'level_harga_id');
    }

    public function mata_uang()
    {
        return $this->belongsTo(MataUang::class, 'mata_uang_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
