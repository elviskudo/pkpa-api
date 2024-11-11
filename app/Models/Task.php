<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Task extends Model
{
    protected $fillable = [
        'uuid',
        'course_id',
        'student_id',
        'name',
        'description',
        'start_date',
        'end_date',
        'is_active',
        'video_url',
        'image_url'
    ];

    //Course Relation
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    //Student Relation
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    //UploadFile Relation
    public function uploadFiles(): HasMany
    {
        return $this->hasMany(UploadFiles::class);
    }
}
