<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;
use App\Http\Resources\AnimalResource;

class AnimalController extends Controller
{
    public function alphabetical() 
    {
        $animalsAlphabetical = Animal::orderBy("name", "asc")->get();

        return AnimalResource::collection($animalsAlphabetical); 
    }

    public function retrieve($animal_id) 
    {
        $animal = Animal::findOrFail($animal_id);

        return new AnimalResource($animal);
    }
}
