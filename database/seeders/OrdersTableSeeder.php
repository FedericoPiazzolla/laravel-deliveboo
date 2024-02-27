<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Prendo l'array di array associativi
        $orders_data_arr = config('orders');

        // Per ogni array in iterazione
        foreach ($orders_data_arr as $orders_data) {

            // Istanzio un nuovo ordine
            $new_order = new Order();

            // Riempio i campi
            $new_order->fill($orders_data);

            // Salvo il nuovo record
            $new_order->save();
        }
    }
}
