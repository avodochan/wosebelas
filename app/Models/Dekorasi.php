<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Dekorasi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_dekorasi';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'nama_dekorasi',
        'deskripsi_dekorasi',
        'harga_dekorasi',
        'thumbnail_dekorasi',
        'foto_dekorasi',
    ];
    
    protected static function boot() 
    {
        parent::boot();
        static::creating(function ($dekorasi) {
           $lastdekorasi = Dekorasi::orderBy('id_dekorasi', 'desc')->first();
           $lastdekorasi = $lastdekorasi ? intval(substr($lastdekorasi->id_dekorasi, 2)) : 0;
           $dekorasi->id_dekorasi = 'DK' . str_pad($lastdekorasi + 1, 4, '0', STR_PAD_LEFT);
           
        });  
    }
    
    public function images()
    {
        return $this->hasMany(DekorasiImage::class, 'dekorasi_id    ', 'id_dekorasi');
    }
}
