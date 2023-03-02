<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'category_id',
        'name',
        'description',
        'internal_code',
        'code',
        'bar_code',
        'image',
        'price'
      ];

      public function category(){

        return $this->belongsTo(Category::class);
      }

      public function store(){

        return $this->belongsTo(Store::class);
      }

      public function products(){
        return $this->morphToMany('App\Model\Product', 'quotable');
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

}
