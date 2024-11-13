<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Forum extends Model
{
    protected $fillable =[
        'uuid',
        'created_by',
        'university_by',
        'title',
        'content',
        'image_url',
        'like_count',
        'dislike_count'
    ];

    //User Relation
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by','uuid');
    }

    //University Relation
    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class,'university_id','uuid');
    }
}
