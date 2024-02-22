<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            // Seeder delle tabelle
            UsersTableSeeder::class,
            RestaurantsTableSeeder::class,
            TypesTableSeeder::class,
            DishesTableSeeder::class,
            OrdersTableSeeder::class,
            
            // Seeder delle tabelle pivot
            RestaurantTypeSeeder::class,
            DishOrderSeeder::class,
        ]);
    }
}
