<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productquo extends Model
{
    use HasFactory;

    protected $fillable = [
        'quotation_id',
        'product_id',
        'name',
        'cant',
        'description',
        'price',
        'subtotal'
    ];
}
