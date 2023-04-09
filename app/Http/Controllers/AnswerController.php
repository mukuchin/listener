<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Http\Requests\AnswerRequest;

class AnswerController extends Controller
{
    public function store(Answer $answer, AnswerRequest $request)
    {
        $input = $request->all();

        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        $answer->fill($input)->save();

        // TODO: Check if this is the correct way to redirect back to the previous page
        return back();
    }
}
