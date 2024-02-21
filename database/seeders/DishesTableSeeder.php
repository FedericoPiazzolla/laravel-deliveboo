<?php

namespace Database\Seeders;

use App\Models\Dish;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;;
use Illuminate\Support\Str;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Prendo tutti i piatti dal file config dishes
        $dishes = config('dishes');

        // Per ogni ristorante
        foreach ($dishes as $dish) {
            
            // invio ogni piatto        
            $new_dish = New Dish();

            $new_dish->restaurant_id = $dish['restaurant_id'];
            $new_dish->name = $dish['name'];
            $new_dish->description = $dish['description'];
            $new_dish->price = $dish['price'];
            $new_dish->available = $dish['available'];
            $new_dish->image = $dish['image'];
            $new_dish->save();

        }
    }
}
