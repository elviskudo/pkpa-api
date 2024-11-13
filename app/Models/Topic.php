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
        'course_id',
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

    //Topic Relation
    public function task(): HasMany
    {
        return $this->hasMany(Task::class,'task_id','uuid');
    }

    //Batch Relation
    public function batchGroup(): HasMany
    {
        return $this->hasMany(Batch::class,'topic_id','uuid');
    }


}
