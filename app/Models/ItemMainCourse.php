<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemMainCourse extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id_item_maincourse';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'nama_item_maincourse',
        'deskripsi_item_maincourse',
        'kategori_item_maincourse',
        'thumbnail_item_maincourse',
    ];
    
    protected static function boot() 
    {
        parent::boot();
        static::creating(function ($itemmaincourse) {
            $lastitemmaincourse = ItemMainCourse::orderBy('id_item_maincourse', 'desc')
                                ->lockForUpdate() // Tambahkan ini untuk menghindari race condition
                                ->first();
            $lastitemmaincourse = $lastitemmaincourse ? intval(substr($lastitemmaincourse->id_item_maincourse, 3)) : 0;
            $itemmaincourse->id_item_maincourse = 'IMC' . str_pad($lastitemmaincourse + 1, 4, '0', STR_PAD_LEFT);
        });
    }
}
