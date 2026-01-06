<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShowTime extends Model
{
    protected $fillable = ['show_id', 'start_time', 'end_time', 'edition', 'location'];

    public function show(): BelongsTo
    {
        return $this->belongsTo(Show::class);
    }
}
