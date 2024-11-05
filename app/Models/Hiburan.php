<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hiburan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_hiburan';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'nama_paket_hiburan',
        'deskripsi_hiburan',
        'harga_sewa_hiburan',
        'thumbnail_hiburan',
        'foto_hiburan',
    ];
    
    protected static function boot() 
    {
        parent::boot();
        static::creating(function ($hiburan) {
           $lasthiburan = Hiburan::orderBy('id_hiburan', 'desc')->first();
           $lasthiburan = $lasthiburan ? intval(substr($lasthiburan->id_hiburan, 2)) : 0;
           $hiburan->id_hiburan = 'HB' . str_pad($lasthiburan + 1, 4, '0', STR_PAD_LEFT);
        });  
    }
    public function images()
    {
        return $this->hasMany(HiburanImage::class, 'hiburan_id', 'id_hiburan');
    }
}
