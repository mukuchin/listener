<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create 50 questions
        Question::factory(50)->create();

        // for each question, attach 1-5 random tags
        foreach (Question::all() as $question) {
            $question->tags()->attach(Tag::all()->random(rand(1, 5)));
        }
    }
}
