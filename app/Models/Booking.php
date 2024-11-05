<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Booking extends Model
{
    // Kolom yang dapat diisi (mass assignment)
    protected $fillable = [
        'user_id', 
        'gedung_id', 
        'bridal_style_id', 
        'dekorasi_id', 
        'dishes_id',
        'dokumentasi_id',
        'hiburan_id',
        'maincourse_id',
        'souvenir_id',
        'undangan_id',
        'tanggal_acara',
        'status'
    ];
}
