<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BridalStyleImage extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_bridalStyleImage';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'nama_pakaian',
        'thumbnail_bridalstyle',
        'foto_paket',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($bridalStyleImage) {
            $lastbridalStyleImage = BridalStyleImage::orderBy('id_bridalStyleImage', 'desc')->first();
            $lastId = $lastbridalStyleImage ? intval(substr($lastbridalStyleImage->id_bridalStyleImage, 3)) : 0;
            $bridalStyleImage->id_bridalStyleImage = 'BSI' . str_pad($lastId + 1, 4, '0', STR_PAD_LEFT);
        });
    }
    
    public function images()
    {
        return $this->hasMany(ItemBridalStyle::class, 'bridalstyle_item_id', 'id_bridalStyleImage');
    }

}
