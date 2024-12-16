<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['user_id','order_total','status'];
    public $timestamps = true;

    public function produks()
    {
        return $this->belongsToMany(Produk::class, 'order_produks')
                    ->withPivot('jumlah_produk', 'subtotal');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');

    }
    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }
    // public function addProduct($id, $quantity = 1)
    // {
    //     $existingProduct = $this->produks()->where('id', $id)->first();

    //     if ($existingProduct) {
    //         // Jika produk sudah ada, tambahkan jumlahnya
    //         $existingProduct->pivot->quantity += $quantity;
    //         $existingProduct->pivot->save();
    //     } else {
    //         // Jika produk belum ada, tambahkan ke order
    //         $this->produks()->attach($id, ['jumlah_produk' => $quantity]);
    //     }
    // }
}
