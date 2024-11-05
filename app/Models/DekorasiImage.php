<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DekorasiImage extends Model
{
    use HasFactory;
    protected $fillable = ['dekorasi_id', 'thumbnail_dekorasi', 'foto_dekorasi'];

    public function dekorasi()
    {
        return $this->belongsTo(Dekorasi::class, 'dekorasi_id', 'id_dekorasi');
    }
}
