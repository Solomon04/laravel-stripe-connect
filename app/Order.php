<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = ['customer_id', 'product_id', 'payment_id'];

    public function customer()
    {
        return $this->hasOne(User::class, 'customer_id');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'product_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'payment_id');
    }
}
