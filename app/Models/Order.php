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
        'banyak_tamu',
    ];
    
    public static function boot()
    {
        parent::boot();

        static::creating(function ($Model) {
            $prefix = 'ODR';
            $lastRecord = self::orderBy('id_pemesanan', 'desc')->first();

            $lastNumber = $lastRecord ? intval(substr($lastRecord->id_pemesanan, strlen($prefix))) : 0;
            $newNumber = $lastNumber + 1;

            $Model->id_pemesanan = $prefix . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id'); // 'OrderItem' adalah model yang merepresentasikan item pesanan
    }
    
    public function invoice()
    {
        return $this->hasOne(Invoice::class, 'id_pemesanan', 'id_pemesanan');
    }

}
