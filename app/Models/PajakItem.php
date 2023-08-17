<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PajakItem extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const PERHITUNGAN_SELECT = [
        'Normal'      => 'Normal',
        'Progressive' => 'Progressive',
    ];

    public const TIPE_PAJAK_ITEM_SELECT = [
        'Pajak Pembelian' => 'Pajak Pembelian',
        'Pajak Penjualan' => 'Pajak Penjualan',
    ];

    public $table = 'pajak_items';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'item_id',
        'pajak_id',
        'perhitungan',
        'tipe_pajak_item',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function pajak()
    {
        return $this->belongsTo(Pajak::class, 'pajak_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
