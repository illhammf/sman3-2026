<?php

namespace Database\Seeders;

use App\Models\SuperiorityFeature;
use Illuminate\Database\Seeder;

class SuperiorityFeatureSeeder extends Seeder
{
    public function run(): void
    {
        $features = [
            [
                'title' => 'Akreditasi Unggul',
                'description' => 'SMA Negeri 3 Kabupaten Tangerang telah meraih akreditasi A (Unggul) dari BAN-S/M, menjamin kualitas pendidikan yang sesuai standar nasional.',
                'icon' => 'fas fa-award',
                'color' => 'blue',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Tenaga Pendidik Profesional',
                'description' => 'Didukung oleh guru-guru berkompeten dan berpengalaman, sebagian besar telah tersertifikasi dan berpendidikan magister.',
                'icon' => 'fas fa-chalkboard-teacher',
                'color' => 'green',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Ekstrakurikuler Beragam',
                'description' => 'Lebih dari 20 ekstrakurikuler aktif mulai dari pramuka, paskibra, PMR, futsal, basket, seni tari, hingga robotik.',
                'icon' => 'fas fa-futbol',
                'color' => 'yellow',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Fasilitas Lengkap & Modern',
                'description' => 'Laboratorium IPA, perpustakaan digital, ruang multimedia, lapangan olahraga, mushola, dan akses WiFi gratis.',
                'icon' => 'fas fa-building',
                'color' => 'purple',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Lingkungan Religius',
                'description' => 'Program pembiasaan keagamaan seperti sholat dhuha, tadarus Al-Quran, dan kajian rutin untuk membentuk karakter beriman dan bertakwa.',
                'icon' => 'fas fa-mosque',
                'color' => 'red',
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Prestasi Gemilang',
                'description' => 'Raih prestasi di tingkat kabupaten, provinsi, hingga nasional dalam berbagai bidang akademik dan non-akademik.',
                'icon' => 'fas fa-trophy',
                'color' => 'orange',
                'sort_order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($features as $feature) {
            SuperiorityFeature::firstOrCreate(
                ['title' => $feature['title']],
                $feature
            );
        }
    }
}
