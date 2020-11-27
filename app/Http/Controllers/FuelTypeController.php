<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FuelType;
use App\Car;

class FuelTypeController extends Controller
{
    public function index()
    {
        $fuel_types = FuelType::all();

        return $fuel_types;
    }

    public function data() 
    {
        $data = [];

        $fuel_types = FuelType::all();

        foreach ($fuel_types as $fuel_type) 
        {
            $id = $fuel_type["id"];
            $name = $fuel_type["name"];
            $numberOfCars = Car::where("fuel_type_id", $id)->count();

            $data[] = [
                "id" => $id, 
                "name" => $name, 
                "count" => $numberOfCars
            ];
        }

        return $data;
    }
}
