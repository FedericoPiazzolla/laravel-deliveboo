<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Restaurant; 

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) 
        {
            $restaurant = new Restaurant();
            $restaurant->email = $faker->email();
            $restaurant->company_name = $faker->sentence(2);
            $restaurant->slug = Str::slug($restaurant->company_name);
            $restaurant->image = "";
            $restaurant->address = $faker->address();
            $restaurant->save();
        }
    }
}
