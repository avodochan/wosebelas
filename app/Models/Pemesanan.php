<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanan'; // Nama tabel jika tidak sesuai dengan konvensi Laravel
    protected $primaryKey = 'id_pemesanan'; // Nama primary key jika tidak sesuai dengan 'id'

    // Relasi One-to-Many: Pemesanan bisa memiliki banyak PesananGedung
    public function pesananGedung()
    {
        return $this->hasMany(PesananGedung::class, 'id_pemesanan', 'id_pemesanan');
    }
}
