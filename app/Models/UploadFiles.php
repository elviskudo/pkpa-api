<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PHPUnit\Framework\Attributes\UsesTrait;

class UploadFiles extends Model
{
    protected $fillable = [
        'uuid',
        'name',
        'model',
        'relation_id',
        'url_name',
        'file_url',
        'file_type',
        'uploaded_at',
        'reviewed_by',
        'reviewed_at',
        'approved_by',
        'approved_at',
        'rejected_by',
        'rejected_at',
    ];

    //Review Task relation
    public function reviewedFiles():BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewed_by','uuid');
    }

    //Approved Task relation
    public function approvedFiles():BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by','uuid');
    }

    //Rejected Files relation
    public function rejectedFiles():BelongsTo
    {
        return $this->belongsTo(User::class,'rejected_by','uuid');
    }
}
