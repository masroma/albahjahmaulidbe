<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MitraBisni extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use Auditable;
    use HasFactory;

    public $table = 'mitra_bisnis';

    protected $appends = [
        'image',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'kode',
        'nama',
        'deskripsi',
        'aktif',
        'tipe_bisnis_customer',
        'tipe_bisnis_supplier',
        'bank',
        'no_rekening',
        'atas_nama',
        'npwp',
        'pkp',
        'tanggal_pkp',
        'no_nik',
        'atas_nama_nik',
        'pembelian_pajak',
        'penjualan_pajak',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function group_1s()
    {
        return $this->belongsToMany(GrupMitraBisnisOne::class);
    }

    public function group_2s()
    {
        return $this->belongsToMany(GrupMitraBisnisTwo::class);
    }

    public function group_3s()
    {
        return $this->belongsToMany(GrupMitraBisnisThree::class);
    }

    public function level_hargas()
    {
        return $this->belongsToMany(LevelHarga::class);
    }

    public function sales()
    {
        return $this->belongsToMany(Sale::class);
    }

    public function getImageAttribute()
    {
        return $this->getMedia('image')->last();
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
