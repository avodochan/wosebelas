<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $primaryKey = 'no_invoice';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'total_tagihan',
    ];
    
    public static function boot()
    {
        parent::boot();

        static::creating(function ($Model) {
            $prefix = 'INV';
            $lastRecord = self::orderBy('no_invoice', 'desc')->first();

            $lastNumber = $lastRecord ? intval(substr($lastRecord->id_pemesanan, strlen($prefix))) : 0;
            $newNumber = $lastNumber + 1;

            $Model->id_pemesanan = $prefix . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
