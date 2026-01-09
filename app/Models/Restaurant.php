<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Storage;

class Restaurant extends Model
{
    protected $fillable = ['name', 'type', 'subtitle', 'tagline', 'description',
        'list_image', 'background_image',
        'public', 'slug'];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function menuItems(): Show|HasMany
    {
        return $this->hasMany(MenuItem::class);
    }

    protected static function booted(): void
    {
        static::deleting(function ($restaurant) {
            Storage::disk('public')->delete([
                $restaurant->list_image,
                $restaurant->background_image
            ]);
        });

        static::updating(function ($restaurant) {
            if ($restaurant->isDirty('list_image')) {
                Storage::disk('public')->delete($restaurant->getOriginal('list_image'));
            }

            if ($restaurant->isDirty('background_image')) {
                Storage::disk('public')->delete($restaurant->getOriginal('background_image'));
            }
        });
    }
}
