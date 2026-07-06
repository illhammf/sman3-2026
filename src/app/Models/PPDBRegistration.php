<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PPDBRegistration extends Model
{
    protected $fillable = [
        'registration_number',
        'full_name',
        'nickname',
        'place_of_birth',
        'date_of_birth',
        'gender',
        'address',
        'rt_rw',
        'village',
        'district',
        'city',
        'postal_code',
        'phone',
        'email',
        'previous_school',
        'previous_school_address',
        'nisn',
        'father_name',
        'father_education',
        'father_occupation',
        'father_phone',
        'mother_name',
        'mother_education',
        'mother_occupation',
        'mother_phone',
        'guardian_name',
        'guardian_education',
        'guardian_occupation',
        'guardian_phone',
        'birth_certificate',
        'family_card',
        'photo',
        'status',
        'notes',
        'registration_date',
    ];

    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
            'registration_date' => 'date',
        ];
    }

    public function statusLabel(): string
    {
        return match ($this->status) {
            'pending' => 'Menunggu Verifikasi',
            'verified' => 'Terverifikasi',
            'accepted' => 'Diterima',
            'rejected' => 'Ditolak',
            default => $this->status,
        };
    }

    public function statusColor(): string
    {
        return match ($this->status) {
            'pending' => 'warning',
            'verified' => 'info',
            'accepted' => 'success',
            'rejected' => 'danger',
            default => 'gray',
        };
    }
}
