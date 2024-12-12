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


}

