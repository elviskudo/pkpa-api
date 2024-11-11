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
        return $this->belongsTo(University::class);
    }

    // Last Education Relation
    public function lastEducation(): HasOne
    {
        return $this->hasOne(LastEducation::class);
    }

    //Course Relation
    public function course(): HasMany
    {
        return $this->hasMany(Course::class);
    }

    //Review Task relation
    public function reviewedFiles():HasMany
    {
        return $this->hasMany(UploadFiles::class, 'reviewed_by');
    }

    //Approved Task relation
    public function approvedFiles():HasMany
    {
        return $this->hasMany(UploadFiles::class, 'approved_by');
    }

    //Rejected Files relation
    public function rejectedFiles():HasMany
    {
        return $this->hasMany(UploadFiles::class,'rejected_by');
    }
}
