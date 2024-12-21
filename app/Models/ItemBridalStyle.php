<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItemBridalStyle extends Model
{
    use HasFactory;
    protected $fillable = ['bridalstyle_item_id', 'thumbnail_bridalstyle', 'foto_paket'];

    public function bridalstyleitem()
    {
        return $this->belongsTo(BridalStyleImage::class, 'bridalstyle_item_id', 'id_bridalStyleImage');
    }
}
