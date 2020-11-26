<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Car;
use App\FuelType;
use App\Manufacturer;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fuelNames = ["Petrol", "Diesel", "Electric"];
        $fuels = [];

        foreach ($fuelNames as $fuelName) 
        {
            $newFuel = FuelType::create([
                "name" => $fuelName
            ]);
            $newFuel->save();
            $fuels[] = $newFuel;
        }

        $manufacturers = [
            "Ford",
            "Nissan",
            "Tesla",
            "Volkswagen",
            "Renault"
        ];

        $carNames = [
            "Fiesta",
            "Mustang",
            "GT-R",
            "Micra",
            "Model X",
            "Model S",
            "Golf",
            "Polo",
            "Clio",
            "Megane"
        ];

        $carNameIndex = 0;
        for ($i = 0; $i < 5; $i++) 
        {
            $newManufacturer = Manufacturer::create([
                "name" => $manufacturers[$i]
            ]);
            $newManufacturer->save();

            for ($j = 0; $j < 2; $j++) 
            {
                $fuel = $fuels[$i % 3];
                $newCar = Car::create([
                    "fuel_type_id" => $fuel->id,
                    "manufacturer_id" => $newManufacturer->id,
                    "name" => $carNames[$carNameIndex],
                    "seats" => 4,
                    "doors" => 4,
                    "top_speed" => 200
                ]);
                $newCar->save();
                $carNameIndex++;
            }
        }
    }
}
