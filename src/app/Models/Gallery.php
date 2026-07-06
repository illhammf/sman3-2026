<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gallery extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'cover_image',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
        ];
    }

    public function images(): HasMany
    {
        return $this->hasMany(GalleryImage::class);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function getCoverImageUrlAttribute()
    {
        if ($this->cover_image) {
            return asset('storage/' . $this->cover_image);
        }

        $firstImage = $this->images()->first();
        if ($firstImage) {
            return asset('storage/' . $firstImage->image);
        }

        return null;
    }
}
