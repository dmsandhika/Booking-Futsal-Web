<?php

namespace Database\Seeders;

use App\Models\Lapangan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class lapanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lapangan::create([
            'nama' => 'Lapangan A',
            'image' => 'img/lapangan_a.webp',
            'keterangan' => 'Lapangan 1',
            'harga' => 50000
        ]);
        Lapangan::create([
            'nama' => 'Lapangan B',
            'image' => 'img/lapangan_b.jpg',
            'keterangan' => 'Lapangan 2',
            'harga' => 60000
        ]);
        Lapangan::create([
            'nama' => 'Lapangan C',
            'image' => 'img/lapangan_c.jpg',
            'keterangan' => 'Lapangan 3',
            'harga' => 40000
        ]);
    }
}