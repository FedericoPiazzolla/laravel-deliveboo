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

        $types = Type::all();

        foreach ($restaurants as $restaurant) {
            foreach ($types as $type) {
                $restaurant->types()->sync($restaurant->id, $type->id);
            }
        }
    }
}
