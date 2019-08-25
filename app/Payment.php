<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $fillable = ['customer_id', 'stripe_charge_id', 'paid_out', 'fees_collected', 'refunded'];

    protected $casts = ['refunded' => 'boolean'];

    public function customer()
    {
        return $this->hasOne(User::class, 'customer_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'payment_id', 'id');
    }
}
