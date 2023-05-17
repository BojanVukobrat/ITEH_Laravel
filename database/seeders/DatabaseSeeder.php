<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Owner;
use Illuminate\Database\Seeder;
use App\Models\Car;
use App\Models\Manufacturer;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        User::truncate();
        Manufacturer::truncate();
        Owner::truncate();
        Car::truncate();

        User::factory(10)->create();

        Manufacturer::insert([
            [
                "name" => "Mercedes",
                "city" => "Berlin",
                "CEO" => "Carl Benz"
            ],
            [
                "name" => "BMW",
                "city" => "Munnich",
                "CEO" => "Michael Sins"
            ],
            [
                "name" => "Ford",
                "city" => "Boston",
                "CEO" => "John Cena"
            ]
        ]);

        Owner::insert([
            [
                "name" => "Milos Mitrovis",
                "age" => 61,
                "is_invalid" => true,
                "nationality" => "serbian",
                "driver_license" => 2475
            ],
            [
                "name" => "Pera Peric",
                "age" => 36,
                "is_invalid" => false,
                "nationality" => "serbian",
                "driver_license" => 2551
            ]
        ]);


        $car_1 = new Car;
        $car_1->model_name = "320d";
        $car_1->color = "Black";
        $car_1->description = "This car is super fast and has many fun things inside the cabin.";
        $car_1->price = "86421";
        $car_1->horsepower = "150";
        $car_1->manufacturer_id = 2;
        $car_1->owner_id = 2;
        $car_1->save();

        Car::create([
            "model_name" => "E200d",
            "color" => "Black",
            "description" => "For luxury and smooth rides this is best car ever.",
            "price" => "82084",
            "horsepower" => "166",
            "manufacturer_id" => 1,
            "owner_id" => 1
        ]);
    }
}
