<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
