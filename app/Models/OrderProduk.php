<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduk extends Model
{
    protected $table = 'order_produks';
    protected $fillable = ['produk_id', 'order_id','jumlah_produk', 'subtotal'];

    public function produks()
    {
        return $this->belongsTo(Produk::class);
    }
    public function orders()
    {
        return $this->belongsTo(Order::class);
    }
}
