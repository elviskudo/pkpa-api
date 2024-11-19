<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Option extends Model
{
    protected $fillable =[
        'uuid',
        'quiz_by_content_id',
        'option',
        'is_answered',
    ];

    // QuizByContent Relation
    public function quizByContent():BelongsTo
    {
        return $this->belongsTo(QuizByContent::class,'quiz_by_content_id','uuid');
    }
}
