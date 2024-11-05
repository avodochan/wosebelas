<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Undangan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_undangan';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'nama_undangan',
        'bahan_undangan',
        'deskripsi_undangan',
        'harga_undangan',
        'thumbnail_undangan',
        'foto_undangan',
    ];
    
    protected static function boot() 
    {
        parent::boot();
        static::creating(function ($undangan) {
           $lastundangan = Undangan::orderBy('id_undangan', 'desc')->first();
           $lastundangan = $lastundangan ? intval(substr($lastundangan->id_undangan, 2)) : 0;
           $undangan->id_undangan = 'UD' . str_pad($lastundangan + 1, 4, '0', STR_PAD_LEFT);
        });  
    }
    public function images()
    {
        return $this->hasMany(Undangan::class, 'undangan_id', 'id_undangan');
    }
}
