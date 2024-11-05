<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dishes extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_dishes';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'nama_dishes',
        'deskripsi_dishes',
        'thumbnail_dishes',
        'foto_dishes',
    ];
    
    protected static function boot() 
    {
        parent::boot();
        static::creating(function ($dishes) {
           $lastdishes = Dishes::orderBy('id_dishes', 'desc')->first();
           $lastdishes = $lastdishes ? intval(substr($lastdishes->id_dishes, 2)) : 0;
           $dishes->id_dishes = 'DS' . str_pad($lastdishes + 1, 4, '0', STR_PAD_LEFT);
           
        });  
    }
    
    public function images()
    {
        return $this->hasMany(DishesImage::class, 'dishes_id', 'id_dishes');
    }
}
