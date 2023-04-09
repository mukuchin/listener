<?php

namespace Database\Seeders;

use App\Models\Answer;
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
        // create 50 base/parent answers
        Answer::factory(50)->create();

        // for each answer, attach 0-3 random answers
        foreach (Answer::all() as $answer) {
            $question_id = $answer->question_id;
            // create 0-3 child answers
            $child_answers = Answer::factory(rand(0, 3))->create();

            foreach ($child_answers as $child_answer) {
                // set question_id for child answers
                $child_answer->question_id = $question_id;
                $child_answer->save();

                $child_child_answers = Answer::factory(rand(0, 3))->create();
                foreach ($child_child_answers as $child_child_answer) {
                    $child_child_answer->question_id = $question_id;
                    $child_child_answer->save();
                }
                $child_answer->children()->saveMany(
                    $child_child_answers
                );
            }
            // attach child answers to answer
            $answer->children()->saveMany(
                $child_answers
            );
        }
    }
}
