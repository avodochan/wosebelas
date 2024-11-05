<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DishesImage extends Model
{
    use HasFactory;
    protected $fillable = ['dishes_id', 'thumbnail_dishes', 'foto_dishes'];

    public function dishes()
    {
        return $this->belongsTo(Dishes::class, 'dishes_id', 'id_dishes');
    }
}
