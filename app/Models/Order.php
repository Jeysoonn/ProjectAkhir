<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['order_total','pengguna_id',];
    public function orderproduk(): HasMany{
        return $this->hasMany(OrderProduk::class);
    }
}
