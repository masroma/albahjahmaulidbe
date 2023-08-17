<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Item extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, Auditable, HasFactory;

    public $table = 'items';

    protected $appends = [
        'photo',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const STATUS_SELECT = [
        'barang_jadi'           => 'Barang Jadi',
        'biaya_tenaga_kerja'    => 'Biaya Tenaga Kerja',
        'barang_hasil_produksi' => 'Barang Hasil Produksi',
        'item_lain_lain'        => 'Item Lain Lain',
        'paket'                 => 'Paket',
        'bahan_pembantu'        => 'Bahan Pembantu',
        'bahan_baku'            => 'Bahan Baku',
        'jasa'                  => 'Jasa',
        'work_in_progress'      => 'Work In Progress',
    ];

    protected $fillable = [
        'item_kode',
        'item_nama',
        'barcode',
        'item_merk_id',
        'item_group_one_id',
        'item_akun_aktif',
        'status',
        'item_alias_nama',
        'item_group_two_id',
        'item_group_three_id',
        'item_satuan_one',
        'item_satuan_two',
        'item_satuan_three',
        'item_akun_pembelian_id',
        'item_akun_hpp_id',
        'item_akun_penjualan_id',
        'item_akun_return_penjualan_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function item_merk()
    {
        return $this->belongsTo(MarkItem::class, 'item_merk_id');
    }

    public function item_group_one()
    {
        return $this->belongsTo(ItemGroupOne::class, 'item_group_one_id');
    }

    public function item_group_two()
    {
        return $this->belongsTo(ItemGroupTwo::class, 'item_group_two_id');
    }

    public function item_group_three()
    {
        return $this->belongsTo(ItemGroupThree::class, 'item_group_three_id');
    }

    public function item_akun_pembelian()
    {
        return $this->belongsTo(Akun::class, 'item_akun_pembelian_id');
    }

    public function item_akun_hpp()
    {
        return $this->belongsTo(Akun::class, 'item_akun_hpp_id');
    }

    public function item_akun_penjualan()
    {
        return $this->belongsTo(Akun::class, 'item_akun_penjualan_id');
    }

    public function item_akun_return_penjualan()
    {
        return $this->belongsTo(Akun::class, 'item_akun_return_penjualan_id');
    }

    public function getPhotoAttribute()
    {
        $files = $this->getMedia('photo');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }

    public function satuans()
    {
        return $this->belongsToMany(Satuan::class);
    }
}
