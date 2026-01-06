<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Storage;

class Show extends Model
{
    protected $fillable = ['name', 'type', 'subtitle', 'tagline', 'description',
        'list_image', 'background_image',
        'public', 'slug'];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function showTimes(): Show|HasMany
    {
        return $this->hasMany(ShowTime::class);
    }

    protected static function booted(): void
    {
        static::deleting(function ($show) {
            Storage::disk('public')->delete([
                $show->list_image,
                $show->background_image
            ]);
        });

        static::updating(function ($show) {
            if ($show->isDirty('list_image')) {
                Storage::disk('public')->delete($show->getOriginal('list_image'));
            }

            if ($show->isDirty('background_image')) {
                Storage::disk('public')->delete($show->getOriginal('background_image'));
            }
        });
    }
}
