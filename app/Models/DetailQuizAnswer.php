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
        'question_id',
        'answer_id',
        'result',
    ];

    //Quiz Relation
    public function quiz(): HasOne
    {
        return $this->hasOne(Quiz::class,'quiz_id','uuid');
    }

    //Question Relation
    public function question():HasOne
    {
        return $this->hasOne(Question::class,'question_id','uuid');
    }

    //Answer Relation
    public function answer():HasOne
    {
        return $this->hasOne(Answer::class,'answer_id','uuid');
    }
}
