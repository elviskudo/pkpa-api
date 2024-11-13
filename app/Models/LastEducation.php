<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LastEducation extends Model
{
    protected $table = 'last_education';

    protected $fillable = [
        'uuid',
        'teacher_id',
        'name',
        'institution',
        'start_date',
        'end_date',
        'degree',
        'field_of_study',
        'gpa',
        'description',
    ];

    // teacher relation
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class,'teacher_id','uuid');
    }
}
