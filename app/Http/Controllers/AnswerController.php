<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Requests\AnswerRequest;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    //作成した回答をPOST
    public function reply(Answer $answer, Question $question, AnswerRequest $request)
    {
        $input = $request->all();
        dd($input);
        $question_id = $question->id;
        $input['user_id'] = Auth::user()->id;
        $input['question_id'] = $question_id;
        $answer->fill($input);

        $file = $request->file('image');
        if (!empty($file)) {
            $filename = $file->getClientOriginalName();
            $move = $file->move('./upload', $filename);
        } else {
            $filename = "";
        }

        // create new question from request
        //$input = $request['question'];
        $answer->image = $filename;
        $answer->save();

        // TODO: Check if this is the correct way to redirect back to the previous page
        return redirect()->route('questions.show', ['question' => $question_id]);
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
    public function destroy(Answer $answer)
    {
        $question_id = $answer->question_id;
        $answer->delete();
        $answer->children()->delete();

        // TODO: Check if this is the correct way to redirect back to the previous page
        return back();
    }
}
