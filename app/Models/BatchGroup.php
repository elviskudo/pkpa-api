<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BatchGroup extends Model
{
    protected $table = 'batch_groups';
    protected $fillable=[
        'uuid',
        'topic_id',
        'name',
        'description',
        'start_date',
        'end_date',
        'is_active',
        'order'
    ];

    //Topic Relation
    public function topicId(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }

    //Batch Relation
    public function batch(): HasMany
    {
        return $this->hasMany(Batch::class);
    }
}
