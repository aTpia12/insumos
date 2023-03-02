<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_name',
        'rfc',
        'zipcode',
        'colony',
        'street',
        'out_number',
        'int_number',
        'city',
        'locally',
        'state',
        'country',
    ];

    public function subsidiaries(){
        return $this->hasMany(Subsidiary::class);
    }

}
