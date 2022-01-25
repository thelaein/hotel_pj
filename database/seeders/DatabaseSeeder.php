<?php

namespace Database\Seeders;


use App\Models\Feature;

use App\Models\Room;
use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

        User::create([
            'name' =>'thel aein',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'), // password
            'remember_token' => Str::random(10),
            'role' => '0'
        ]);
      
      
        Feature::factory(15)->create();
      


         \App\Models\User::factory(10)->create();
         Room::factory(20)->create();





    }
}
