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
        $this->call([
            // CategorySeeder::class,
            // PostSeeder::class,


            // create users
            UserSeeder::class,
            // create tags
            TagSeeder::class,
            // create questions
            QuestionSeeder::class,
            // create answers
            AnswerSeeder::class,
        ]);
    }
}
