<?php

namespace App\Models;

use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'body',
        'user_id',
        'question_id',
    ];

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

    // reference child answers, if any
    public function children()
    {
        return $this->hasMany(Answer::class);
    }
}
