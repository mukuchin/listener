<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create 50 answers
        Answer::factory(50)->create();

        // for answer id below 20, attach 0-3 random answers of id 25-50
        // this is to prevent circular reference
        foreach (Answer::all() as $answer) {
            if ($answer->id < 20) {
                $answer->answers()->attach(Answer::all()->where('id', '>=', 25)->random(rand(0, 3)));
            }
        }
    }
}
