<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Manufacturer;
use App\FuelType;

class CarController extends Controller
{
    /* Allows for url query parameters ?manufacturer=... and ?fueltype=...
    *  if both are used, then the intersection of both queries are returned
    *  e.g. ?manufacturer=1&fueltype=1 will return cars where manufacturer_id = 1 AND fuel_type_id = 1
    */
    public function index() 
    {
        $cars = Car::all();

        if (request("manufacturer") && request("fueltype"))
        {
            $cars_by_manufacturer = Manufacturer::where("id", request("manufacturer"))->firstOrFail()->cars;

            $cars_by_fueltype = FuelType::where("id", request("fueltype"))->firstOrFail()->cars; 

            $cars = $cars_by_fueltype->intersect($cars_by_manufacturer);
        }
        else 
        {
            if (request("manufacturer")) 
            {
                $cars = Manufacturer::where("id", request("manufacturer"))->firstOrFail()->cars;
            }

            if (request("fueltype"))
            {
                $cars = FuelType::where("id", request("fueltype"))->firstOrFail()->cars; 
            }
        }

        return $cars;
    }

    public function retrieve($id) 
    {
        $car = Car::findOrFail($id);

        return $car;
    }
}
