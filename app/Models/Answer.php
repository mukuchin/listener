<?php

namespace App\Models;

use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answer extends Model
{
    use HasFactory;

    // one-to-many for questions
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    // one-to-many for users
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // reference parent answer, if any
    public function parent()
    {
        return $this->belongsTo(Answer::class);
    }

    // reference child answers, if any
    public function children()
    {
        return $this->hasMany(Answer::class);
    }
}
