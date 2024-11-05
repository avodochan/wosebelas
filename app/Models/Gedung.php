<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gedung extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_gedung';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'nama_gedung',
        'tipe_gedung',
        'alamat_gedung',
        'kapasitas_gedung',
        'harga_sewa_gedung',
        'status_gedung',
        'deskripsi_gedung',
        'thumbnail_gedung',
        'foto_gedung',
    ];
    
    protected static function boot() 
    {
        parent::boot();
        static::creating(function ($gedung) {
           $lastgedung = Gedung::orderBy('id_gedung', 'desc')->first();
           $lastgedung = $lastgedung ? intval(substr($lastgedung->id_gedung, 2)) : 0;
           $gedung->id_gedung = 'GD' . str_pad($lastgedung + 1, 4, '0', STR_PAD_LEFT);
        });  
    }
    
    public function images()
    {
        return $this->hasMany(GedungImage::class, 'gedung_id', 'id_gedung');
    }
    
    public function pesananGedung()
    {
        return $this->hasMany(PesananGedung::class, 'id_gedung', 'id_gedung');
    }
}
