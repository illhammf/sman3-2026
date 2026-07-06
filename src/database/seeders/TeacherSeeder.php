<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        $teachers = [
            [
                'name' => 'Dr. H. Ahmad Fauzi, S.Pd., M.Pd.',
                'nip' => '196801011994121001',
                'position' => 'Kepala Sekolah',
                'subject' => '-',
                'bio' => 'Kepala SMA Negeri 3 Kabupaten Tangerang periode 2020-sekarang',
                'is_published' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Dra. Hj. Siti Rohmah',
                'nip' => '196702011995032002',
                'position' => 'Wakil Kepala Sekolah Bidang Kurikulum',
                'subject' => 'Biologi',
                'is_published' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Drs. H. Dudung Abdulrahman',
                'nip' => '196803011996031001',
                'position' => 'Wakil Kepala Sekolah Bidang Kesiswaan',
                'subject' => 'Sejarah',
                'is_published' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Hj. Yuni Lestari, S.Pd.',
                'nip' => '197205011998032005',
                'position' => 'Wakil Kepala Sekolah Bidang Sarana Prasarana',
                'subject' => 'Matematika',
                'is_published' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Asep Suherman, S.Pd., M.M.',
                'nip' => '197312052000031004',
                'position' => 'Wakil Kepala Sekolah Bidang Humas',
                'subject' => 'Ekonomi',
                'is_published' => true,
                'sort_order' => 5,
            ],
            [
                'name' => 'Rina Marlina, S.Pd.',
                'nip' => '197506102002122006',
                'position' => 'Guru',
                'subject' => 'Bahasa Indonesia',
                'is_published' => true,
                'sort_order' => 6,
            ],
            [
                'name' => 'Dedi Kusnadi, S.Pd.',
                'nip' => '197808152005011007',
                'position' => 'Guru',
                'subject' => 'Bahasa Inggris',
                'is_published' => true,
                'sort_order' => 7,
            ],
            [
                'name' => 'Fitri Handayani, S.Pd.',
                'nip' => '198001122006042008',
                'position' => 'Guru',
                'subject' => 'Fisika',
                'is_published' => true,
                'sort_order' => 8,
            ],
        ];

        foreach ($teachers as $teacher) {
            Teacher::firstOrCreate(
                ['nip' => $teacher['nip']],
                $teacher
            );
        }
    }
}
