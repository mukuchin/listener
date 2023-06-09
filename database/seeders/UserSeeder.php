<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create 20 users
        User::factory(20)->create();
        // create new user with email example@example.com
        User::factory()->create([
            'email' => 'example@example.com',
            'name' => 'Tarou Yamada',
            'password' => bcrypt('password'),
        ]);
    }
}
