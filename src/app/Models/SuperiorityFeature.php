<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuperiorityFeature extends Model
{
    protected $fillable = [
        'title',
        'description',
        'icon',
        'image',
        'color',
        'sort_order',
        'is_active',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
