<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Check extends Model
{
    protected $fillable = [
        'url_id', 'status_code', 'response', 'attempt'
    ];

    public function url(): BelongsTo
    {
        return $this->belongsTo(Url::class);
    }
}
