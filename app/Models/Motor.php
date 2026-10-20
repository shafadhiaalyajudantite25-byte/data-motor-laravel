<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    protected $table = 'motors';

    protected $fillable = [
        'nama_produk',
        'spesifikasi',
        'harga',
        'qty',
    ];
}
