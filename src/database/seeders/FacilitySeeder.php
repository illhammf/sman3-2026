<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    public function run(): void
    {
        $facilities = [
            ['name' => 'Ruang Kelas', 'description' => 'Ruang kelas yang nyaman dan dilengkapi dengan fasilitas belajar mengajar yang memadai, termasuk LCD proyektor dan AC.'],
            ['name' => 'Laboratorium IPA', 'description' => 'Laboratorium Fisika, Kimia, dan Biologi yang lengkap dengan peralatan praktikum modern.'],
            ['name' => 'Laboratorium Komputer', 'description' => 'Laboratorium komputer dengan 40 unit PC yang terhubung internet untuk mendukung pembelajaran TIK.'],
            ['name' => 'Perpustakaan', 'description' => 'Perpustakaan sekolah dengan koleksi buku yang lengkap dan area baca yang nyaman.'],
            ['name' => 'Lapangan Olahraga', 'description' => 'Lapangan serbaguna untuk basket, futsal, voli, dan atletik.'],
            ['name' => 'Musholla', 'description' => 'Musholla yang bersih dan nyaman untuk kegiatan ibadah siswa dan guru.'],
            ['name' => 'Aula', 'description' => 'Aula serbaguna untuk kegiatan akademik dan non-akademik.'],
            ['name' => 'Kantin', 'description' => 'Kantin yang bersih dengan makanan dan minuman sehat.'],
            ['name' => 'UKS', 'description' => 'Unit Kesehatan Sekolah dengan peralatan P3K yang lengkap.'],
            ['name' => 'Ruang Seni', 'description' => 'Ruang khusus untuk kegiatan seni dan ekstrakurikuler kesenian.'],
        ];

        foreach ($facilities as $index => $facility) {
            Facility::firstOrCreate(
                ['name' => $facility['name']],
                array_merge($facility, ['sort_order' => $index + 1])
            );
        }
    }
}
