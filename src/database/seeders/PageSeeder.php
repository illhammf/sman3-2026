<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'title' => 'Sejarah Sekolah',
                'slug' => 'sejarah',
                'content' => '<h2>Sejarah SMA Negeri 3 Kabupaten Tangerang</h2><p>SMA Negeri 3 Kabupaten Tangerang didirikan pada tahun ... sebagai bagian dari upaya pemerintah daerah dalam meningkatkan akses pendidikan menengah di wilayah Kabupaten Tangerang.</p><p>Sejak awal berdiri, sekolah ini terus berkembang dan berkomitmen untuk mencetak generasi muda yang berprestasi, berakhlak mulia, dan berdaya saing global.</p><p>Hingga saat ini, SMA Negeri 3 Kabupaten Tangerang telah meluluskan ribuan siswa yang tersebar di berbagai perguruan tinggi ternama dan dunia kerja.</p>',
                'template' => 'default',
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'title' => 'Visi dan Misi',
                'slug' => 'visi-misi',
                'content' => '<h2>Visi</h2><blockquote><p>Terwujudnya peserta didik yang beriman, bertakwa, berakhlak mulia, unggul dalam prestasi, berbudaya, dan berwawasan lingkungan.</p></blockquote><h2>Misi</h2><ol><li>Menumbuhkan penghayatan dan pengamalan ajaran agama serta budi pekerti luhur.</li><li>Melaksanakan pembelajaran dan bimbingan secara efektif, kreatif, dan inovatif.</li><li>Mengembangkan potensi akademik dan non-akademik peserta didik secara optimal.</li><li>Menanamkan nilai-nilai budaya dan karakter bangsa.</li><li>Menciptakan lingkungan sekolah yang bersih, hijau, dan nyaman.</li><li>Membangun kerjasama dengan orang tua, masyarakat, dan stakeholder pendidikan.</li></ol>',
                'template' => 'default',
                'is_published' => true,
                'published_at' => now(),
            ],
        ];

        foreach ($pages as $page) {
            Page::firstOrCreate(
                ['slug' => $page['slug']],
                $page
            );
        }
    }
}
