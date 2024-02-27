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
        $restaurant_types = config('restaurants_types');

        foreach ($restaurant_types as $restaurant_type) {
            $restaurant = Restaurant::where('id', $restaurant_type["restaurant_id"])->first();
            $restaurant->types()->attach($restaurant_type["type_id"]);
        }
    }
}
