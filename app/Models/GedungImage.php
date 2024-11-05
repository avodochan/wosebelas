<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GedungImage extends Model
{
    use HasFactory;
    protected $fillable = ['gedung_id', 'thumbanil_gedung', 'foto_gedung'];

    public function gedung()
    {
        return $this->belongsTo(Gedung::class, 'gedung_id', 'id_gedung');
    }
}
