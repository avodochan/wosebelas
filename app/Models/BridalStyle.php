<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BridalStyle extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_bridalstyle';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'nama_paket_bridalstyle',
        'deskripsi_paket',
        'harga_paket',
        'thumbnail_bridalstyle'
    ];
    
    protected static function boot() 
    {
        parent::boot();
        static::creating(function ($bridalstyle) {
           $lastbridalstyle = BridalStyle::orderBy('id_bridalstyle', 'desc')->first();
           $lastbridalstyle = $lastbridalstyle ? intval(substr($lastbridalstyle->id_bridalstyle, 2)) : 0;
           $bridalstyle->id_bridalstyle = 'BS' . str_pad($lastbridalstyle + 1, 4, '0', STR_PAD_LEFT);
           
        });  
    }
    
    
}
