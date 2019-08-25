<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['seller_id', 'upc' , 'name', 'price', 'image', 'description'];

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
}
