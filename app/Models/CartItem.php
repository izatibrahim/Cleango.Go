<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = [
        'cart_id' => 'cart_id',
        'paket_id' => 'paket_id',
        'qty' => 'qty',
        'harga' => 'harga'
    ];

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'paket_id');
    }
}


