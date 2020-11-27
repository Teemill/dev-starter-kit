<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarOrder extends Model
{
    protected $dates = ['order_made_at'];

    protected $fillable = ["car_id", "order_id", "order_made_at"];
}
