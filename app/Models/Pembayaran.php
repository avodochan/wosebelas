<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Pembayaran extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pembayaran';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id_pemesanan',
        'metode_pembayaran',
        'jumlah_pembayaran',
        'status_transaksi`,'
    ];
    
    protected static function boot() 
    {
        parent::boot();
        static::creating(function ($pembayaran) {
           $lastpembayaran = pembayaran::orderBy('id_pembayaran', 'desc')->first();
           $lastpembayaran = $lastpembayaran ? intval(substr($lastpembayaran->id_pembayaran, 2)) : 0;
           $pembayaran->id_pembayaran = 'PB' . str_pad($lastpembayaran + 1, 4, '0', STR_PAD_LEFT);
           
        });  
    }
    
    public function pemesanan()
    {
        return $this->belongsTo(Order::class, 'pemesanan_id', 'id_pemesanan');
    }
}
