<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // @todo: add order priority
    protected $fillable = [
        'reference',
        'created_by',
        'phone',
        'order_state_id',
        'notes',
        'order_amount',
        'total_paid',
    ];
}
