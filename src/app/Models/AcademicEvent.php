<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicEvent extends Model
{
    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'type',
        'color',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
            'is_published' => 'boolean',
        ];
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function typeLabel(): string
    {
        return match ($this->type) {
            'academic' => 'Akademik',
            'holiday' => 'Libur',
            'exam' => 'Ujian',
            'activity' => 'Kegiatan',
            default => $this->type,
        };
    }
}
