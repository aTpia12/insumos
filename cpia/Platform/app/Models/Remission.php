<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remission extends Model
{
    use HasFactory;

    protected $fillable = [
        'serie',
        'folio',
        'subtotal',
        'discount',
        'total'
    ];

    public function subsidiaries(){
        return $this->belongsToMany(Subsidiary::class);
    }
}
