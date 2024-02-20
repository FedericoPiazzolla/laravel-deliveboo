<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = Restaurant::all();

        $restaurant_types = config('restaurants_types');

        foreach ($restaurants as $restaurant) {
            foreach ($restaurant_types as $restaurant_types_arr) {
                $restaurant->types()->attach($restaurant_types_arr["type_id"]);
            }
        }
    }
}
