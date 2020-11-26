<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarOrder extends Model
{
    protected $fillable = ["car_id", "order_id"];
}
