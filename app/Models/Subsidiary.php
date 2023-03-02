<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subsidiary extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'alias',
        'telephone',
        'email',
        'send_address',
    ];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
