<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    protected $fillable =[
        'uuid',
        'university',
        'teacher_id',
        'category_id',
        'name',
        'description',
        'background_url',
        'guideline_url',
        'accessed',
        'is_publish',
        'is_forum',
    ];

    //Category Relation
    public function category(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    //Teacher Relation
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    //University Relation
    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class);
    }

    //Task Relation
    public function task(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
