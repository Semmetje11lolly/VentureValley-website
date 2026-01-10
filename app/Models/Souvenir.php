<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Storage;

class Souvenir extends Model
{
    protected $fillable = ['name', 'type', 'subtitle', 'tagline', 'description',
        'list_image', 'background_image',
        'public', 'slug'];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function shopItems(): Show|HasMany
    {
        return $this->hasMany(ShopItem::class);
    }

    protected static function booted(): void
    {
        static::deleting(function ($souvenir) {
            Storage::disk('public')->delete([
                $souvenir->list_image,
                $souvenir->background_image
            ]);
        });

        static::updating(function ($souvenir) {
            if ($souvenir->isDirty('list_image')) {
                Storage::disk('public')->delete($souvenir->getOriginal('list_image'));
            }

            if ($souvenir->isDirty('background_image')) {
                Storage::disk('public')->delete($souvenir->getOriginal('background_image'));
            }
        });
    }
}
