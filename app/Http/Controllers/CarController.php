<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Manufacturer;
use App\FuelType;
use App\Search;
use App\Http\Resources\CarResource;
use Illuminate\Support\Facades\Log;

class CarController extends Controller
{
    /* Allows for url query parameters ?manufacturer=... and ?fueltype=...
    *  if both are used, then the intersection of both queries are returned
    *  e.g. ?manufacturer=1&fueltype=1 will return cars where manufacturer_id = 1 AND fuel_type_id = 1
    */
    public function index() 
    {
        $cars = Car::all();

        if (request("search"))
        {
            return $this->search();
        }

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

        return CarResource::collection($cars);
    }

    public function retrieve($id) 
    {
        $car = Car::findOrFail($id);

        return new CarResource($car);
    }

    public function store() 
    {
        $validatedData = request()->validate([
            "name" => "required",
            "manufacturer_id" => "required",
            "fuel_type_id" => "required",
            "seats" => "required",
            "doors" => "required",
            "top_speed" => "required"
        ]);

        $newCar = Car::create([
            "name" => $validatedData["name"],
            "fuel_type_id" => $validatedData["fuel_type_id"],
            "manufacturer_id" => $validatedData["manufacturer_id"],
            "seats" => $validatedData["seats"],
            "doors" => $validatedData["doors"],
            "top_speed" => $validatedData["top_speed"]
        ]);

        $newCar->save();
    }

    private function search() 
    {
        $search_query = request("search");

        $search_made_before = Search::where("search_query", $search_query)->first();

        if ($search_made_before)
        {
            $search_made_before->count++;
            $search_made_before->save();
        }
        else
        {
            $new_search = Search::create([
                "search_query" => $search_query,
                "count" => 1
            ]);
            $new_search->save();
        }

        $search_words = explode(" ", $search_query);

        $total_results = collect();

        foreach ($search_words as $word)
        {
            $possible_manufacturer = Manufacturer::where("name", $word)->first();

            if ($possible_manufacturer)
            {
                $intermediate_results = Car::where("manufacturer_id", $possible_manufacturer->id)->get();
                $total_results = $total_results->merge($intermediate_results);
                
                continue;
            }

            $possible_cars_by_name = Car::where("name", $word)->get();
            $total_results = $total_results->merge($possible_cars_by_name);
        }

        return $total_results->unique();
    }
}
