<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Content extends Model
{
    protected $fillable =[
        'uuid',
        'name',
        'description',
        'image_url',
        'is_random',
        'is_active',
        'min_valud',
        'duration',
        'next_step',
    ];

    public function quizByContent(): HasOne
    {
        return $this->hasOne(QuizByContent::class,'content_id','uuid');
    }
}
