<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'tb_paket'; // Nama tabel di phpMyAdmin kamu
    protected $primaryKey = 'id';    // Sesuaikan jika primary key-mu bukan 'id'
    protected $fillable = ['nama_paket', 'harga', 'jenis']; // Sesuaikan dengan kolom tabelmu
    public $timestamps = false; // Matikan timestamps jika tabelmu tidak punya kolom created_at & updated_at
}