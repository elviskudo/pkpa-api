<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quiz extends Model
{
    protected $fillable = [
        'uuid',
        'name',
        'description',
    ];

    public function question(): HasMany
    {
        return $this->hasMany(Question::class,'quiz_id','uuid');
    }

    public function detailQuizAnswer(): BelongsTo
    {
        return $this->belongsTo(DetailQuizAnswer::class,'quiz_id','uuid');
    }
}
