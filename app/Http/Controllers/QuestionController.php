<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    // return view
    public function index()
    {
        return view('questions.index')->with([
            'questions' => Question::getQuestionWithTagsAndAnswers()
        ]);
    }

    public function show(Question $question)
    {
        return view('questions.show')->with([
            'question' => $question,
            'answers' => $question->answers
        ]);
    }
}
