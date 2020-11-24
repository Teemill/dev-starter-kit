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
        $faker = new Faker;

        $fuelOne = FuelType::create([
            "name" => "Petrol"
        ]);
        $fuelOne->save();

        $fuelTwo = FuelType::create([
            "name" => "Diesel"
        ]);
        $fuelTwo->save();

        $fuelThree = FuelType::create([
            "name" => "Diesel"
        ]);
        $fuelThree->save();

        $fuels = [$fuelOne, $fuelTwo, $fuelThree];

        $manufacturers = [
            "Ford",
            "Nissan",
            "Tesla",
            "Volkswagen",
            "Renault"
        ];

        for ($i = 0; $i < 5; $i++) {
            $newManufacturer = Manufacturer::create([
                "name" => $manufacturers[$i]
            ]);
            $newManufacturer->save();

            for ($j = 0; $j < 2; $j++) {
                $fuel = $fuels[$i % 3];
                $newCar = Car::create([
                    "fuel_type_id" => $fuel->id,
                    "manufacturer_id" => $newManufacturer->id,
                    "name" => "Car Name " . $i . $j,
                    "seats" => 4,
                    "doors" => 4,
                    "top_speed" => 200
                ]);
                $newCar->save();
                /*
                $newCar->fuelType()->save($fuel);
                $newCar->manufacturer()->save($newManufacturer);
                */
            }
        }
    }
}
