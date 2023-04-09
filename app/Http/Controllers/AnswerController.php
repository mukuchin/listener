<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Http\Requests\AnswerRequest;

class AnswerController extends Controller
{
    //作成した回答をPOST
    public function reply(Answer $answer, AnswerRequest $request)
    {
        $input = $request->all();
        $question_id = input['question'];
        $input['user_id'] = Auth::user()->id;
        $answer->fill($input)->save();

        // TODO: Check if this is the correct way to redirect back to the previous page
        return redirect()->route('questions.show', ['question_id' => $question_id]);
        
    }
    
    //回答を編集
    public function update(Answer $answer, AnswerRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        $answer->fill($input)->save();

        // TODO: Check if this is the correct way to redirect back to the previous page
        return back();
    }
    
    //回答を削除
    public function delete(Answer $answer)
    {
        $question_id = $answer->question_id;
        $answer->delete();

        // TODO: Check if this is the correct way to redirect back to the previous page
        return redirect()->route('questions.show', ['question_id' => $question_id]);
    }
}
