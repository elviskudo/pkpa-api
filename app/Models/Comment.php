<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Comment extends Model
{
    protected $fillable=[
        'uuid',
        'created_by',
        'forum_id',
        'content',
        'like_count',
        'dislike_count',
    ];


    public function forum(): BelongsTo
    {
        return $this->belongsTo(Forum::class,'forum_id','uuid');
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by','uuid');
    }
}
