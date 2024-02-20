<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // Prendo tutti i ristoranti
        $restaurants = Restaurant::all();

        // Per ogni ristorante
        foreach ($restaurants as $restaurant) {
            
            // Creo dieci piatti a cui assegno l'id del ristorante in iterazione
            for ($i = 0; $i < 10; $i++) {
                $dish = New Dish();

                $dish->restaurant_id = $restaurant->id;
                $dish->name = $faker->sentence(2);
                $dish->description = $faker->text(200);
                $dish->price = $faker->randomFloat(4, 2, 25);
                $dish->available = $faker->boolean();
                $dish->save();
            }  
        }
    }
}
