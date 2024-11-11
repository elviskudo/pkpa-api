<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    protected $fillable = [
        'uuid',
        'name',
        'description',
        'url',
        'icon',
        'parent_id',
    ];


    // Parent Relation
    public function parent():BelongsTo
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }


    // Children Relation
    public function children():HasMany
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }
}
