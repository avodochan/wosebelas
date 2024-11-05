<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_dokumentasi';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'nama_paket_dokumentasi',
        'deskripsi_dokumentasi',
        'harga_dokumentasi',
        'thumbnail_dokumentasi',
        'foto_dokumentasi',
    ];
    
    protected static function boot() 
    {
        parent::boot();
        static::creating(function ($dokumentasi) {
           $lastdokumentasi = Dokumentasi::orderBy('id_dokumentasi', 'desc')->first();
           $lastdokumentasi = $lastdokumentasi ? intval(substr($lastdokumentasi->id_dokumentasi, 2)) : 0;
           $dokumentasi->id_dokumentasi = 'DK' . str_pad($lastdokumentasi + 1, 4, '0', STR_PAD_LEFT);
        });  
    }
    
    public function images()
    {
        return $this->hasMany(DokumentasiImage::class, 'dokumentasi_id', 'id_dokumentasi');
    }
}
