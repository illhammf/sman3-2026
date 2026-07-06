<?php

namespace Database\Seeders;

use App\Models\NewsCategory;
use Illuminate\Database\Seeder;

class NewsCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Berita Sekolah', 'slug' => 'berita-sekolah', 'description' => 'Berita terkini seputar kegiatan SMA Negeri 3 Kabupaten Tangerang'],
            ['name' => 'Pengumuman', 'slug' => 'pengumuman', 'description' => 'Pengumuman resmi dari sekolah'],
            ['name' => 'Prestasi', 'slug' => 'prestasi', 'description' => 'Prestasi yang diraih oleh siswa dan guru'],
            ['name' => 'Kegiatan', 'slug' => 'kegiatan', 'description' => 'Informasi kegiatan sekolah'],
        ];

        foreach ($categories as $category) {
            NewsCategory::firstOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}
