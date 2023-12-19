<?php

namespace Database\Seeders;

use App\Models\Antrian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class AntrianSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Antrian::create([
            'clinic_id' => 1,
            'tanggal' => Carbon::now()->setTime(8, 30, 0)->addDays(1),
            'harga' => 200000,
            'kuota' => 5,
        ]);

        Antrian::create([
            'clinic_id' => 1,
            'tanggal' => Carbon::now()->setTime(10, 30, 0)->addDays(2),
            'harga' => 200000,
            'kuota' => 5,
        ]);

        Antrian::create([
            'clinic_id' => 2,
            'tanggal' => Carbon::now()->setTime(8, 30, 0)->addDays(1),
            'harga' => 200000,
            'kuota' => 5,
        ]);
    }
}
