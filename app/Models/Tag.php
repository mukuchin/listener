<?php

namespace App\Models;

use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    // many-to-many for questions
    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }
}
