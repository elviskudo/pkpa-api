<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class QuizByContent extends Model
{
    protected $fillable = [
        'uuid',
        'content_id',
        'question',
        'random',
        'order',
        'is_active',
    ];

    public function content():BelongsTo
    {
        return $this->belongsTo(Content::class,'content_id','uuid');
    }

    public function option():HasMany
    {
        return $this->hasMany(Option::class,'quiz_by_content_id','uuid');
    }
}
