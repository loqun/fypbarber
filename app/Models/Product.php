<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'descripton',
        'image',
        'barcode',
        'price',
        'quantity',
        'status',
        'type'
    ];
}
