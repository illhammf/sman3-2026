<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            SettingSeeder::class,
            NewsCategorySeeder::class,
            PageSeeder::class,
            TeacherSeeder::class,
            StaffSeeder::class,
            ExtracurricularSeeder::class,
            FacilitySeeder::class,
        ]);
    }
}
