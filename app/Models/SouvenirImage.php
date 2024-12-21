<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SouvenirImage extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_souvenirImage';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'kategori_souvenir',
        'nama_souvenir',
        'thumbnail_souvenir',
        'foto_souvenir',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($souvenirImage) {
            $lastsouvenirImage = SouvenirImage::orderBy('id_souvenirImage', 'desc')->first();
            $lastId = $lastsouvenirImage ? intval(substr($lastsouvenirImage->id_souvenirImage, 3)) : 0;
            $souvenirImage->id_souvenirImage = 'SVI' . str_pad($lastId + 1, 4, '0', STR_PAD_LEFT);
        });
        
    }
    
    protected $casts = [
        'foto_souvenir' => 'array',
    ];
    
    public function images()
    {
        return $this->hasMany(SouvenirItemImage::class, 'souvenir_item_id', 'id_souvenirImage');
    }
}
