<?php

namespace App\Models;

use App\CheckStatusType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Url extends Model
{
    protected $fillable = [
        'url',
        'frequency',
        'retry',
        'retry_frequency',
        'status',
        'last_checked_at',
    ];

    protected $casts = [
        'last_checked_at' => 'datetime',
        'status' => CheckStatusType::class,
    ];
    public function checks(): HasMany
    {
        return $this->hasMany(Check::class);
    }
}
