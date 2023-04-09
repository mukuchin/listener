<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'body',
        'user_id',
    ];

    // many-to-many for tags
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // one-to-many for answers
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    // one-to-many for users
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // eager load tags when fetching questions
    public static function getQuestionWithTags()
    {
        return self::with('tags')->get();
    }

    public static function getQuestionWithTagsAndAnswers()
    {
        return Question::with('tags', 'answers')->get();
    }

    // get questions by user id
    public static function getQuestionsByUserID($user_id)
    {
        return Question::where('user_id', $user_id)->get();
    }
}
