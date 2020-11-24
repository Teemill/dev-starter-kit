<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $guarded = [];

    public function manufacuturer() 
    {
        return $this->hasOne("App\FuelType");
    }

    public function fuelType() 
    {
        return $this->hasOne("App\FuelType");
    }
}
