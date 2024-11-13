<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    protected $fillable = [
        'university_id',
        'uuid',
        'name',
        'email',
        'phone',
        'birth_place',
        'birth_date',
        'address',
    ];

    //University Relation
    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class);
    }

    //Quiz Result Relation
    public function quizResult(): HasOne
    {
        return $this->hasOne(QuizResult::class);
    }

    //Task Relation
    public function Task():HasMany
    {
        return $this->hasMany(Task::class);
    }
}