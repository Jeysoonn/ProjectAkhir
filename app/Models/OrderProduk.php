<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduk extends Model
{
    protected $table = 'orderproduks';
    protected $fillable = ['order_id', 'produk_id', 'jumlah_produk', 'subtotal'];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
