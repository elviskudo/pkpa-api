<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    //Review Task relation
    public function reviewedFiles():HasOne
    {
        return $this->hasOne(UploadFiles::class, 'reviewed_by','uuid');
    }

    //Approved Task relation
    public function approvedFiles():HasOne
    {
        return $this->hasOne(UploadFiles::class, 'approved_by','uuid');
    }

    //Rejected Files relation
    public function rejectedFiles():HasOne
    {
        return $this->hasOne(UploadFiles::class,'rejected_by','uuid');
    }

    //Comment Relation
    public function user(): HasMany
    {
        return $this->hasMany(Comment::class,'created_by','uuid');
    }
}
