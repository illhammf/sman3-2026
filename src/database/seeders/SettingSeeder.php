<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'school_name', 'value' => 'SMA Negeri 3 Kabupaten Tangerang', 'group' => 'general', 'type' => 'text'],
            ['key' => 'school_npsn', 'value' => '', 'group' => 'general', 'type' => 'text'],
            ['key' => 'school_address', 'value' => '', 'group' => 'general', 'type' => 'textarea'],
            ['key' => 'school_village', 'value' => '', 'group' => 'general', 'type' => 'text'],
            ['key' => 'school_district', 'value' => '', 'group' => 'general', 'type' => 'text'],
            ['key' => 'school_city', 'value' => 'Kabupaten Tangerang', 'group' => 'general', 'type' => 'text'],
            ['key' => 'school_province', 'value' => 'Banten', 'group' => 'general', 'type' => 'text'],
            ['key' => 'school_postal_code', 'value' => '', 'group' => 'general', 'type' => 'text'],
            ['key' => 'school_phone', 'value' => '', 'group' => 'general', 'type' => 'text'],
            ['key' => 'school_email', 'value' => '', 'group' => 'general', 'type' => 'text'],
            ['key' => 'school_website', 'value' => '', 'group' => 'general', 'type' => 'text'],
            ['key' => 'school_logo', 'value' => '', 'group' => 'general', 'type' => 'image'],
            ['key' => 'school_favicon', 'value' => '', 'group' => 'general', 'type' => 'image'],
            ['key' => 'principal_name', 'value' => '', 'group' => 'general', 'type' => 'text'],
            ['key' => 'principal_photo', 'value' => '', 'group' => 'general', 'type' => 'image'],
            ['key' => 'school_vision', 'value' => '', 'group' => 'profile', 'type' => 'textarea'],
            ['key' => 'school_mission', 'value' => '', 'group' => 'profile', 'type' => 'textarea'],
            ['key' => 'about_school', 'value' => '', 'group' => 'profile', 'type' => 'textarea'],
            ['key' => 'welcome_message', 'value' => 'Selamat datang di website resmi SMA Negeri 3 Kabupaten Tangerang', 'group' => 'general', 'type' => 'textarea'],
            ['key' => 'facebook_url', 'value' => '', 'group' => 'social', 'type' => 'text'],
            ['key' => 'instagram_url', 'value' => '', 'group' => 'social', 'type' => 'text'],
            ['key' => 'youtube_url', 'value' => '', 'group' => 'social', 'type' => 'text'],
            ['key' => 'twitter_url', 'value' => '', 'group' => 'social', 'type' => 'text'],
            ['key' => 'tiktok_url', 'value' => '', 'group' => 'social', 'type' => 'text'],
            ['key' => 'google_maps_embed', 'value' => '', 'group' => 'contact', 'type' => 'textarea'],
            ['key' => 'school_coordinates', 'value' => '', 'group' => 'contact', 'type' => 'text'],
            ['key' => 'ppdb_is_open', 'value' => 'false', 'group' => 'ppdb', 'type' => 'text'],
            ['key' => 'ppdb_start_date', 'value' => '', 'group' => 'ppdb', 'type' => 'text'],
            ['key' => 'ppdb_end_date', 'value' => '', 'group' => 'ppdb', 'type' => 'text'],
            ['key' => 'ppdb_information', 'value' => '', 'group' => 'ppdb', 'type' => 'textarea'],
            ['key' => 'ppdb_requirements', 'value' => '', 'group' => 'ppdb', 'type' => 'textarea'],
            ['key' => 'ppdb_quota', 'value' => '', 'group' => 'ppdb', 'type' => 'text'],
            ['key' => 'school_achievements', 'value' => '', 'group' => 'profile', 'type' => 'textarea'],
            ['key' => 'school_accreditation', 'value' => '', 'group' => 'general', 'type' => 'text'],
        ];

        foreach ($settings as $setting) {
            Setting::firstOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
