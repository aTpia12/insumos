<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'serie',
        'folio',
        'iva',
        'subtotal',
        'discount',
        'total'
    ];


    public function subsidiaries(){
        return $this->belongsToMany(Subsidiary::class);
    }
}
