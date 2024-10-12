<?php

namespace Database\Seeders;

use App\Models\Properti;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PropertiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Properti::create([
            'nama' => 'Bola',
            'harga' => 100000
        ]);
        Properti::create([
            'nama' => 'Rompi (10 Set)',
            'harga' => 100000
        ]);
        Properti::create([
            'nama' => 'Sepatu Futsal',
            'harga' => 200000
        ]);
    }
}