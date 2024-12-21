<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class SouvenirItemImage extends Model
{
    use HasFactory;
    protected $fillable = ['souvenir_item_id', 'thumbnail_souvenir', 'foto_souvenir'];

    public function souveniritem()
    {
        return $this->belongsTo(SouvenirImage::class, 'souvenir_item_id', 'id_souvenirImage');
    }
}
