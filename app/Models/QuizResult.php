<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class QuizResult extends Model
{
    protected $table = 'quiz_results';

    protected $fillable =[
        'sudent_id',
        'uuid',
        'quiz_start',
        'quiz_end',
        'quetion_count',
        'correct_answers',
        'incorrect_answers',
        'unanswered',
        'score',
        'status',
    ];

    //Student Relation
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
