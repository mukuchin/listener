<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory, SoftDeletes;

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
}
