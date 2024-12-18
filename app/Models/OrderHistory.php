<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    protected $fillable = [
        'user_id', 'email', 'order_total', 'status',
        'produk_nama', 'produk_harga',
        'jumlah_produk', 'produk_subtotal'
    ];
    // Relasi ke Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }


    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
