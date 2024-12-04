<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produks';

    // Tentukan kolom-kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'nama_produk',
        'kategori',
        'deskripsi',
        'stock',
        'harga',
    ];
}
