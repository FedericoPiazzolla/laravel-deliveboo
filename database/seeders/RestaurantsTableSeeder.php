<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Restaurant;
use App\Models\User;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = config('restaurants');

        // Per ogni utente appena seeddato:
        foreach ($restaurants as $restaurant) {
            $new_restaurant = new Restaurant();

            // Ad ogni ristorante assegno l'id dell'utente in iterazione
            $new_restaurant->user_id = $restaurant['user_id'];

            // Continuo col riempimento delle colonne rimanenti
            $new_restaurant->restaurant_email = $restaurant['restaurant_email'];
            $new_restaurant->restaurant_name = $restaurant['restaurant_name'];
            $new_restaurant->slug = Str::slug($new_restaurant->restaurant_name);
            $new_restaurant->restaurant_image = $restaurant['restaurant_image'];
            $new_restaurant->restaurant_logo = $restaurant['restaurant_logo'];
            $new_restaurant->restaurant_address = $restaurant['restaurant_address'];
            $new_restaurant->save();
        }
    }
}
