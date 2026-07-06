<?php

namespace Database\Seeders;

use App\Models\Extracurricular;
use Illuminate\Database\Seeder;

class ExtracurricularSeeder extends Seeder
{
    public function run(): void
    {
        $extracurriculars = [
            [
                'name' => 'Pramuka',
                'slug' => 'pramuka',
                'description' => 'Kegiatan kepramukaan yang membentuk karakter disiplin, mandiri, dan bertanggung jawab.',
                'coach' => 'Dedi Kusnadi, S.Pd.',
                'schedule' => 'Sabtu, 08.00 - 12.00 WIB',
                'is_active' => true,
            ],
            [
                'name' => 'Paskibra',
                'slug' => 'paskibra',
                'description' => 'Pasukan Pengibar Bendera yang melatih kedisiplinan dan kecintaan pada tanah air.',
                'coach' => 'Asep Suherman, S.Pd., M.M.',
                'schedule' => 'Jumat, 15.00 - 17.00 WIB',
                'is_active' => true,
            ],
            [
                'name' => 'Rohis',
                'slug' => 'rohis',
                'description' => 'Rohani Islam sebagai wadah pengembangan spiritual dan akhlak siswa.',
                'coach' => 'Drs. H. Dudung Abdulrahman',
                'schedule' => 'Kamis, 15.30 - 17.00 WIB',
                'is_active' => true,
            ],
            [
                'name' => 'Basket',
                'slug' => 'basket',
                'description' => 'Olahraga basket yang mengembangkan bakat dan kemampuan fisik siswa.',
                'coach' => 'Rudi Hermawan, S.Pd.',
                'schedule' => 'Selasa & Kamis, 16.00 - 18.00 WIB',
                'is_active' => true,
            ],
            [
                'name' => 'Futsal',
                'slug' => 'futsal',
                'description' => 'Olahraga futsal yang melatih kerjasama tim dan sportivitas.',
                'coach' => 'Ahmad Rizal, S.Pd.',
                'schedule' => 'Senin & Rabu, 16.00 - 18.00 WIB',
                'is_active' => true,
            ],
            [
                'name' => 'PMR',
                'slug' => 'pmr',
                'description' => 'Palang Merah Remaja yang bergerak di bidang kesehatan dan kemanusiaan.',
                'coach' => 'Fitri Handayani, S.Pd.',
                'schedule' => 'Sabtu, 09.00 - 12.00 WIB',
                'is_active' => true,
            ],
            [
                'name' => 'Seni Tari',
                'slug' => 'seni-tari',
                'description' => 'Pengembangan bakat seni tari tradisional dan modern.',
                'coach' => 'Rina Marlina, S.Pd.',
                'schedule' => 'Rabu, 15.30 - 17.30 WIB',
                'is_active' => true,
            ],
            [
                'name' => 'English Club',
                'slug' => 'english-club',
                'description' => 'Pengembangan kemampuan berbahasa Inggris melalui diskusi dan kegiatan interaktif.',
                'coach' => 'Fitriani, S.Pd.',
                'schedule' => 'Selasa, 15.30 - 17.00 WIB',
                'is_active' => true,
            ],
        ];

        foreach ($extracurriculars as $ekskul) {
            Extracurricular::firstOrCreate(
                ['slug' => $ekskul['slug']],
                $ekskul
            );
        }
    }
}
