<?php

namespace Database\Seeders;

use App\Models\Court;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Timestamp now
        $now = now();

        // Tambah data seed
        Court::insert([
            [
                'name'      => 'Dian Jaya Badminton Hall',
                'city'      => 'Bekasi',
                'district'  => 'Bekasi Selatan',
                'image_url' => null,
                'open_time' => '07:00:00',
                'close_time' => '22:00:00',
                'field_count' => 5,
                'maps_url' => 'https://maps.example.com/dian-jaya',
                'contact_name' => 'Dian Jaya',
                'contact_whatsapp' => '081234567890',
                'rating' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'      => 'GOR Bulutangkis Villa Mas Indah',
                'city'      => 'Bekasi',
                'district'  => 'Bekasi Utara',
                'image_url' => null,
                'open_time' => '08:00:00',
                'close_time' => '21:00:00',
                'field_count' => 3,
                'maps_url' => 'https://maps.example.com/villa-mas-indah',
                'contact_name' => 'Villa Mas Indah',
                'contact_whatsapp' => '089876543210',
                'rating' => 5,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'      => 'Ferry Jaya Badminton Hall',
                'city'      => 'Bekasi',
                'district'  => 'Rawalumbu',
                'image_url' => null,
                'open_time' => '06:00:00',
                'close_time' => '23:00:00',
                'field_count' => 4,
                'maps_url' => 'https://maps.example.com/ferry-jaya',
                'contact_name' => 'Ferry Jaya',
                'contact_whatsapp' => '082112345678',
                'rating' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'      => 'GOR Badminton BETOS',
                'city'      => 'Bekasi',
                'district'  => 'Bekasi Timur',
                'image_url' => null,
                'open_time' => '09:00:00',
                'close_time' => '20:00:00',
                'field_count' => 6,
                'maps_url' => 'https://maps.example.com/betos',
                'contact_name' => 'BETOS',
                'contact_whatsapp' => '083334567890',
                'rating' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
