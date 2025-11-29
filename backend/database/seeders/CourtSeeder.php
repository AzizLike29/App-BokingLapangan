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
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'      => 'GOR Bulutangkis Villa Mas Indah',
                'city'      => 'Bekasi',
                'district'  => 'Bekasi Utara',
                'image_url' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'      => 'Ferry Jaya Badminton Hall',
                'city'      => 'Bekasi',
                'district'  => 'Rawalumbu',
                'image_url' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'      => 'GOR Badminton BETOS',
                'city'      => 'Bekasi',
                'district'  => 'Bekasi Timur',
                'image_url' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
