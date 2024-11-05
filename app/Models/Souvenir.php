<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Souvenir extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_souvenir';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'nama_paket_souvenir',
        'deskripsi_paket_souvenir',
        'harga_paket_souvenir',
    ];
    
    protected static function boot() 
    {
        parent::boot();
        static::creating(function ($souvenir) {
           $lastsouvenir = Souvenir::orderBy('id_souvenir', 'desc')->first();
           $lastsouvenir = $lastsouvenir ? intval(substr($lastsouvenir->id_souvenir, 2)) : 0;
           $souvenir->id_souvenir = 'SV' . str_pad($lastsouvenir + 1, 4, '0', STR_PAD_LEFT);
        });  
    }
    public function images()
    {
        return $this->hasMany(Souvenir::class, 'souvenir_id', 'id_souvenir');
    }
}
