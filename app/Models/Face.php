<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Face extends Model
{
    protected $fillable =[
        'uuid',
        'student_id',
        'image_url',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class,'student_id','uuid');
    }
}
