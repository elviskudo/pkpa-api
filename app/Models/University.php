<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class University extends Model
{
    protected $fillable = [
        'uuid',
        'name',
        'code',
        'description',
        'slug',
        'image_url',
        'logo_url',
        'certificate_url',
        'brochure_url',
        'vision',
        'mission',
        'goal',
        'candidate_agreement',
        'core_pattern',
        'is_active',
        'order',
    ];


    // Teacher Relation
    public function teachers(): HasMany
    {
        return $this->hasMany(Teacher::class);
    }

    // Course Relation
    public function course(): HasMany
    {
        return $this->hasMany(Course::class);
    }

    //Student Relation
    public function student(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    //Forum Topic Relation
    public function comments(): HasMany
    {
        return $this->hasMany(ForumTopic::class, 'foreign_key', 'local_key');
    }
}
