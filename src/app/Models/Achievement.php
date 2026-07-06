<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = [
        'title',
        'type',
        'achieved_by',
        'scope',
        'achievement_date',
        'description',
        'photo',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'achievement_date' => 'date',
        ];
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}
