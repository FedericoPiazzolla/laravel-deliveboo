<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Faker\Generator as Faker;
use Faker\Provider\it_IT\Company as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = config('users');

        foreach($users as $user) {
            $new_user = new User();

            $new_user->fill($user);
            $new_user->vat_number = $faker->vat();

            $new_user->save();
        }
    }
}
