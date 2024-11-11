<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DetailQuizAnswer extends Model
{
    protected $fillable =[
        'uuid',
        'quiz_id',
        'question',
        'answer_id',
        'result',
    ];

    public function quiz(): HasOne
    {
        return $this->hasOne(Quiz::class);
    }

    public function question():HasOne
    {
        return $this->hasOne(Question::class);
    }

    public function answer():HasOne
    {
        return $this->hasOne(Answer::class);
    }
}
