<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HiburanImage extends Model
{
    use HasFactory;
    protected $fillable = ['hiburan_id', 'thumbnail_hiburan', 'foto_hiburan'];

    public function hiburan()
    {
        return $this->belongsTo(Hiburan::class, 'hiburan_id', 'id_hiburan');
    }
}
