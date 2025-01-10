<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\support\Str;

class Face extends Model
{
    protected $fillable =[
        'uuid',
        'student_id',
        'image_url',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function($model){
            $model->uuid = (string) Str::uuid();
        });
    }

    //Student Relation
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class,'student_id','uuid');
    }
}

