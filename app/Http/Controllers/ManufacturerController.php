<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacturer;
use App\Car;
use Illuminate\Support\Facades\Log;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manufacturers = Manufacturer::all();

        return $manufacturers;
    }

    public function data() 
    {
        $data = [];

        $manufacturers = Manufacturer::all();

        foreach ($manufacturers as $manufacturer) 
        {
            $id = $manufacturer["id"];
            $name = $manufacturer["name"];
            $numberOfCars = Car::where("manufacturer_id", $id)->count();

            $data[] = [
                "id" => $id, 
                "name" => $name, 
                "no_of_cars" => $numberOfCars
            ];
        }

        return $data;
    }

    public function store(Request $request)
    {
        //
    }
}
