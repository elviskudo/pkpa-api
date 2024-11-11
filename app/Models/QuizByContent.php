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

    public function quiz():BelongsTo
    {
        return $this->belongsTo(Content::class);
    }

    public function option():HasMany
    {
        return $this->hasMany(Option::class);
    }
}
