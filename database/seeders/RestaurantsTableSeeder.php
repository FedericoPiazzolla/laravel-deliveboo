<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
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
    public function run(Faker $faker)
    {
        // Prendo tutto gli utenti
        $users = User::all();

        // Per ogni utente appena seeddato:
        foreach ($users as $user) {
            $restaurant = new Restaurant();

            // Ad ogni ristorante assegno l'id dell'utente in iterazione
            $restaurant->user_id = $user->id;

            // Continuo col riempimento delle colonne rimanenti
            $restaurant->restaurant_email = $faker->email();
            $restaurant->restaurant_name = $faker->sentence(2);
            $restaurant->slug = Str::slug($restaurant->company_name);
            $restaurant->restaurant_image = "";
            $restaurant->restaurant_address = $faker->address();
            $restaurant->save();
        }
    }
}
