<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productrems extends Model
{
    use HasFactory;

    protected $fillable = [
        'remission_id',
        'product_id',
        'name',
        'cant',
        'description',
        'price',
        'subtotal'
    ];
}
