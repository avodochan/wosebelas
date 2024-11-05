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
            // Ambil entri terakhir
            $lastbridalStyleImage = BridalStyleImage::orderBy('id_bridalStyleImage', 'desc')->first();

            // Jika entri terakhir ada, ambil bagian numeriknya dan tambah 1. Jika tidak ada, mulai dari 0
            $lastId = $lastbridalStyleImage ? intval(substr($lastbridalStyleImage->id_bridalStyleImage, 3)) : 0;

            // Buat ID baru dengan format BSI dan angka 4 digit
            $bridalStyleImage->id_bridalStyleImage = 'BSI' . str_pad($lastId + 1, 4, '0', STR_PAD_LEFT);
        });
    }
    
    public function bridalstyle()
    {
        return $this->belongsTo(Dekorasi::class, 'bridalstyle_id', 'id_bridalstyle');
    }

}
