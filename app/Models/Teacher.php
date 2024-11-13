<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Teacher extends Model
{
    protected $fillable = [
        'uuid',
        'university_id',
        'name',
        'nik',
        'code',
        'speciality',
        'description',
        'focus',
    ];


    //University Relation
    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class,'university_id','uuid');
    }

    // Last Education Relation
    public function lastEducation(): HasOne
    {
        return $this->hasOne(LastEducation::class,'teacher_id','uuid');
    }

    //Course Relation
    public function course(): HasMany
    {
        return $this->hasMany(Course::class,'teacher_id','uuid');
    }
}
