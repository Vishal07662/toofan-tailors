<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    //
    protected $fillable = [
        'user_id',
        'order_id',
        'order_state_id',
    ];
}
