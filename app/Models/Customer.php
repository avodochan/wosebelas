<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers'; 
    protected $primaryKey = 'id_customer';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'user_id', 
        'nama',
        'email',
        'no_telepon',
        'nik',
        'gender',
        'alamat',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($customer) {
            $lastcustomer = Customer::orderBy('id_customer', 'desc')->first();
            $lastcustomer = $lastcustomer ? intval(substr($lastcustomer->id_customer, 2)) : 0;
            $customer->id_customer = 'CS' . str_pad($lastcustomer + 1, 4, '0', STR_PAD_LEFT);
        });
    }

    // Relasi balik ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
