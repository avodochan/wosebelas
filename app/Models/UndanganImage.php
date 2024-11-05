<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UndanganImage extends Model
{
    use HasFactory;
    protected $fillable = ['undangan_id', 'thumbnail_undangan', 'foto_undangan'];

    public function undangan()
    {
        return $this->belongsTo(Undangan::class, 'undangan_id', 'id_undangan');
    }
}
