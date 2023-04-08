<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    // return view
    public function index()
    {
        return view('questions.index')->with([
            'questions' => Question::all()
        ]);
    }
}
