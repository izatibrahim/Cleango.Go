<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = ['user_id', 'paket_id', 'no_transaksi', 'total_harga', 'status', 'catatan'];

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'paket_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
