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
    ];

    public function quizByContent():BelongsTo
    {
        return $this->belongsTo(QuizByContent::class);
    }
}
