<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{
    protected $fillable = [
        'uuid',
        'question_id',
        'text',
        'type'
    ];

    //Question Relation
    public function question():BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    //Detail Quiz Relation
    public function detailQuizAnswer():BelongsTo
    {
        return $this->belongsTo(DetailQuizAnswer::class);
    }
}
