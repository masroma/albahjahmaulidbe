<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Akun extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'akuns';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'akun_kode',
        'akun_nama',
        'akun_parent_id',
        'akun_jenis_id',
        'akun_klasifikasi_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function itemAkunPembelianItems()
    {
        return $this->hasMany(Item::class, 'item_akun_pembelian_id', 'id');
    }

    public function itemAkunHppItems()
    {
        return $this->hasMany(Item::class, 'item_akun_hpp_id', 'id');
    }

    public function itemAkunPenjualanItems()
    {
        return $this->hasMany(Item::class, 'item_akun_penjualan_id', 'id');
    }

    public function itemAkunReturnPenjualanItems()
    {
        return $this->hasMany(Item::class, 'item_akun_return_penjualan_id', 'id');
    }

    public function akun_parent()
    {
        return $this->belongsTo(AkunParent::class, 'akun_parent_id');
    }

    public function akun_jenis()
    {
        return $this->belongsTo(AkunJeni::class, 'akun_jenis_id');
    }

    public function akun_klasifikasi()
    {
        return $this->belongsTo(AkunKlasifikasi::class, 'akun_klasifikasi_id');
    }
}
