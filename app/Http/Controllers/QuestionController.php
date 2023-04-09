<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\QuestionRequest;

class QuestionController extends Controller
{
    // list all questions
    public function index()
    {
        return view('questions.index')->with([
            'questions' => Question::getQuestionWithTagsAndAnswers(),
        ]);
    }

    // list questions created by a specific user
    public function myQuestions()
    {
        $user_id = Auth::user()->id;
        return view('questions.myQuestions')->with([
            'questions' => Question::getQuestionsByUserID($user_id)
        ]);
    }

    // Show a single question
    public function show(Question $question)
    {
        return view('questions.show')->with([
            'question' => $question,
            // pass user id to allow user to edit their answers
            'user_id' => Auth::user()->id
        ]);
    }

    // Show the form to create a new question
    public function create()
    {
        return view('questions.create')->with([
            'tags' => \App\Models\Tag::all()
        ]);
    }

    // Store a new question
    public function store(Question $question, QuestionRequest $request)
    {
        // create new question from request
        $input = $request['question'];
        $input['user_id'] = Auth::user()->id;
        $question->fill($input)->save();

        // attach tags to question
        $question->tags()->attach($request->tags);

        return redirect()->route('questions.index');
    }

    // Edit a question
    public function edit(Question $question)
    {
        return view('questions.edit')->with([
            'question' => $question,
            'tags' => \App\Models\Tag::all()
        ]);
    }

    // Update a question
    public function update(Question $question, QuestionRequest $request)
    {
        // update question from request
        $input = $request->all();
        $question->fill($input)->save();

        // sync tags to question
        $question->tags()->sync($request->tags);

        return redirect()->route('questions.index');
    }

    // delete a question
    public function destroy(Question $question)
    {
        $question->delete();
        $question->tags()->detach();
        return redirect()->route('questions.index');
    }
}
