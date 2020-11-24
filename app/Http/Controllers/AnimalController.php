<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;

class AnimalController extends Controller
{
    public function alphabetical() {
        $animalsAscending = Animal::orderBy("name", "asc")->get();

        return $animalsAscending; 
    }

    public function retrieve($animal_id) {
        $animal = Animal::findOrFail($animal_id);

        return $animal;
    }
}
