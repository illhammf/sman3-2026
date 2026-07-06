<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    public function run(): void
    {
        $staff = [
            [
                'name' => 'Tatang Sutarman',
                'nip' => '196805052000121002',
                'position' => 'Kepala Tata Usaha',
                'is_published' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Euis Kurniasih',
                'nip' => '197412022006042011',
                'position' => 'Staff Tata Usaha',
                'is_published' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Agus Supriyadi',
                'position' => 'Staff Tata Usaha',
                'is_published' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Dewi Sartika',
                'position' => 'Petugas Perpustakaan',
                'is_published' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($staff as $person) {
            Staff::firstOrCreate(
                array_filter(['nip' => $person['nip'] ?? null]),
                $person
            );
        }
    }
}
