<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'is_important',
        'is_published',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'is_important' => 'boolean',
            'is_published' => 'boolean',
            'published_at' => 'datetime',
        ];
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeImportant($query)
    {
        return $query->where('is_important', true);
    }
}
