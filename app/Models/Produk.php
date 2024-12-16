<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produks';
    protected $fillable = [
        'nama_produk',
        'kategori',
        'deskripsi',
        'stock',
        'harga',
        'foto'
    ];
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_produks')
                    ->withPivot('jumlah_produk', 'subtotal')
                    ->withTimestamps();
    }


}

