<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumentasiImage extends Model
{
    use HasFactory;
    protected $fillable = ['dokumentasi_id', 'thumbnail_dokumentasi', 'foto_dokumentasi'];

    public function dokumentasi()
    {
        return $this->belongsTo(Dokumentasi::class, 'dokumentasi_id', 'id_dokumentasi');
    }
}
