<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bestFood extends Model
{
    use HasFactory;
    protected $table = 'best_food';
    protected $fillable = [
        'kode',
        'nama',
        'harga',
        'is_ready',
        'image',
    ];
};
    

