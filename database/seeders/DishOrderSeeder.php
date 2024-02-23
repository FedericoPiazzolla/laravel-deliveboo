<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DishOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dishes_orders = config('dish_order');

        foreach ($dishes_orders as $dish_order) {
            $dishes = [
                "0" => Dish::where('id', $dish_order["dish_id"][0])->first(),
                "1" => Dish::where('id', $dish_order["dish_id"][1])->first(),
            ];
            foreach ($dishes as $dish) {
                $dish->orders()->attach($dish_order["order_id"]);
            }
        }
    }
}
