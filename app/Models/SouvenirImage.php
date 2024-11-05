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
            // Ambil entri terakhir
            $lastsouvenirImage = SouvenirImage::orderBy('id_souvenirImage', 'desc')->first();

            // Jika entri terakhir ada, ambil bagian numeriknya dan tambah 1. Jika tidak ada, mulai dari 0
            $lastId = $lastsouvenirImage ? intval(substr($lastsouvenirImage->id_souvenirImage, 3)) : 0;

            // Buat ID baru dengan format BSI dan angka 4 digit
            $souvenirImage->id_souvenirImage = 'SVI' . str_pad($lastId + 1, 4, '0', STR_PAD_LEFT);
        });
    }
    
    protected $casts = [
        'foto_souvenir' => 'array',
    ];
}
