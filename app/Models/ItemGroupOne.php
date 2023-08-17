<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemGroupOne extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const AKUN_HPP_SELECT = [
    ];

    public const AKUN_PEMBELIAN_SELECT = [
    ];

    public const AKUN_PENJUALAN_SELECT = [
    ];

    public const ITEM_TYPE_SELECT = [
        '1' => 'Barang Jadi',
    ];

    public $table = 'item_group_ones';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'kode',
        'nama',
        'item_type',
        'akun_pembelian',
        'akun_hpp',
        'akun_penjualan',
        'akun_retur_penjualan',
        'tampil_pos',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function itemGroupOneItems()
    {
        return $this->hasMany(Item::class, 'item_group_one_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
