<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maincourse extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_maincourse';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'nama_paket_maincourse',
        'deskripsi_paket_maincourse',
        'harga_paket_maincourse',
        'thumbnail_maincourse',
        'foto_paket_maincourse',
    ];
    
    protected static function boot() 
    {
        parent::boot();
        static::creating(function ($maincourse) {
           $lastmaincourse = Maincourse::orderBy('id_maincourse', 'desc')->first();
           $lastmaincourse = $lastmaincourse ? intval(substr($lastmaincourse->id_maincourse, 2)) : 0;
           $maincourse->id_maincourse = 'MC' . str_pad($lastmaincourse + 1, 4, '0', STR_PAD_LEFT);
        });  
    }
    public function images()
    {
        return $this->hasMany(MaincourseImage::class, 'maincourse_id', 'id_maincourse');
    }
    
    public function itemMaincourses()
    {
        return $this->belongsToMany(ItemMaincourse::class, 'paket_item_maincourse', 'paket_id', 'item_maincourse_id');
    }

    public function dishes()
    {
        return $this->belongsToMany(Dishes::class, 'paket_dishes', 'paket_id', 'dishes_id');
    }
}
