<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keranjang extends Model
{
    use HasFactory;
    protected $table = "keranjangs";
    protected $fillable = [
        'jumlah_pemesanan',
        'keterangan',
        'product_id',
    ];

    public function bestFood(){
        return $this->hasOne(bestFood::class, 'id', 'product_id');
    }

    
}
