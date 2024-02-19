<?php

namespace Database\Seeders;

use App\Models\Dish;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class DishTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $dish = New Dish();
            $dish->name = $faker->sentence(2);
            $dish->description = $faker->text(200);
            $dish->price = $faker->randomFloat(4, 2, 25);
            $dish->available = $faker->boolean();
            $dish->save();
        }
    }
}
