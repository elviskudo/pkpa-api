<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    protected $fillable =[
        'uuid',
        'name',
        'description',
        'is_active',
        'order',
    ];

    //Course
    public function course():BelongsToMany
    {
        return $this->belongsToMany(Course::class);
    }
}
