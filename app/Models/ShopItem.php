<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShopItem extends Model
{
    protected $fillable = ['souvenir_id', 'name', 'description', 'price'];
    protected $touches = ['souvenir'];

    public function souvenir(): BelongsTo
    {
        return $this->belongsTo(Souvenir::class);
    }
}
