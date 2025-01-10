<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Course extends Model
{
    protected $fillable = [
        'uuid',
        'university_id',
        'teacher_id',
        'category_id',
        'name',
        'description',
        'teacher_id',
        'class_type',
        'background_image',
        'certificate_url',
        'guideline_url',
        'is_publish',
        'is_forum',
        'order',
        'university_id',
        'topic_id'
    ];
    protected static function boot()
    {
        parent::boot();

        // Saat record 'creating', isi kolom uuid jika belum ada
        static::creating(function ($model) {
            if (!$model->uuid) {
                $model->uuid = (string) Str::uuid();
            }
        });
        static::creating(function ($model) {
            // Jika 'university_id' belum diisi, set default
            if (!$model->university_id) {
                $model->university_id = '0eb1bb46-19db-484f-880a-f77876ddb11a';
            }
            if (!$model->category_id) {
                $model->category_id = 'b5e8c1b3-5f38-4245-af4a-77c93254c5e3'; // Ganti sesuai default
            }
        });
    }
    public function category(): BelongsToMany
    {
        return $this->belongsToMany(Category::class,'category_id','uuid');
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'uuid');
    }

    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class, 'university_id', 'uuid');
    }

    public function topic(): HasMany
    {
        return $this->hasMany(Topic::class, 'topic_id', 'uuid');
    }
}
