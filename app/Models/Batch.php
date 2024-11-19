<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Batch extends Model
{
    protected $fillable = [
        'uuid',
        'topic_id',
        'name',
        'description',
        'video_url',
        'start_date',
        'end_date',
        'is_active',
        'order',
    ];

    //BatchGroup
    public function batchGroup(): BelongsTo
    {
        return $this->belongsTo(Topic::class,'topic_id','uuid');
    }
}
