<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'total', 'status'];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }


    public function paket()
    {
        return $this->belongsTo(Paket::class, 'paket_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

