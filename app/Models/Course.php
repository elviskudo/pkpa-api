<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    protected $fillable = [
        'uuid',
        'university_id',
        'teacher_id',
        'category_id',
        'name',
        'description',
        'teacher_id',
        'class_type',
        'background_image',
        'certificate_url',
        'guideline_url',
        'is_publish',
        'is_forum',
        'order',
        'university_id',
        'topic_id'
    ];

    public function category(): BelongsToMany
    {
        return $this->belongsToMany(Category::class,'category_id','uuid');
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'uuid');
    }

    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class, 'university_id', 'uuid');
    }

    public function topic(): HasMany
    {
        return $this->hasMany(Topic::class, 'topic_id', 'uuid');
    }
}
