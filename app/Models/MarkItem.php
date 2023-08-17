<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MarkItem extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'mark_items';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'kode',
        'nama',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function itemMerkItems()
    {
        return $this->hasMany(Item::class, 'item_merk_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
