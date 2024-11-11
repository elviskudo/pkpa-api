<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Topic extends Model
{
    protected $fillable = [
        'uuid',
        'name',
        'description',
        'start_date',
        'end_date',
        'is_active',
        'order',
        'course-id',
        'video_url',
        'image_url'
    ];

    //Batch Group relation
    public function batchGroup(): HasOne
    {
        return $this->hasOne(BatchGroup::class);
    }
}
