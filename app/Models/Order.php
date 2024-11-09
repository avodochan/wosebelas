<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pemesanan';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'user_id',
        'status',
        'tanggal_acara',
        'total_biaya',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
