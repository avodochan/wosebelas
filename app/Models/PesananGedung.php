<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananGedung extends Model
{
    use HasFactory;

    protected $table = 'pesanan_gedung'; // Nama tabel jika tidak sesuai dengan konvensi Laravel
    protected $primaryKey = 'id_pesanan_gedung'; // Nama primary key jika tidak sesuai dengan 'id'

    // Relasi Many-to-One: PesananGedung milik satu Gedung
    public function gedung()
    {
        return $this->belongsTo(Gedung::class, 'id_gedung', 'id_gedung');
    }

    // Relasi Many-to-One: PesananGedung milik satu Pemesanan
    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'id_pemesanan', 'id_pemesanan');
    }
}
