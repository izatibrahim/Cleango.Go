<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['order_id', 'paket_id', 'qty', 'harga'];

    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }
}

