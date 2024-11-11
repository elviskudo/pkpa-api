<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LastEducation extends Model
{
    protected $table = 'last_education';

    protected $fillable = [
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
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
