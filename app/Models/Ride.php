<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Ride extends Model
{
    protected $fillable = ['name', 'type', 'subtitle', 'tagline', 'description',
        'list_image', 'background_image',
        'stat_speed', 'stat_length', 'stat_height', 'stat_duration', 'stat_capacity',
        'property_controllable', 'property_audio', 'property_smoothcoasters', 'public', 'slug'];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected static function booted(): void
    {
        static::deleting(function ($ride) {
            Storage::disk('public')->delete([
                $ride->list_image,
                $ride->background_image
            ]);
        });

        static::updating(function ($ride) {
            if ($ride->isDirty('list_image')) {
                Storage::disk('public')->delete($ride->getOriginal('list_image'));
            }

            if ($ride->isDirty('background_image')) {
                Storage::disk('public')->delete($ride->getOriginal('background_image'));
            }
        });
    }
}
