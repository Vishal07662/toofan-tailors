<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    //
    protected $fillable = [
        'user_id',
        'order_id',
        'transaction_id',
        'payment_mode',
        'remarks',
        'amount',
    ];
}
