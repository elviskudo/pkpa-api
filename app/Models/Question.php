<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Question extends Model
{
    protected $fillable = [
        'uuid',
        'quiz_id',
        'text'
    ];

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class,'quiz_id','uuid');
    }

    public function answer(): HasOne
    {
        return $this->hasOne(Answer::class,'question_id','uuid');
    }

    public function detailQuizAnswer(): BelongsTo
    {
        return $this->belongsTo(DetailQuizAnswer::class,'question_id','uuid');
    }
}
