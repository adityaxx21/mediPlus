<?php

namespace Database\Seeders;

use App\Models\Clinic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ClinicSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // buka pukul 08:00
        $formattedTimeOpen = "08:00:00";

        // tutup pukul 20:00
        $formattedTimeClosed = "21:00:00";

        Clinic::create(
            [
                'nama' => 'RS Puri Husada',
                'kategori' => 'Rumah Sakit',
                'alamat' => 'Km.11, Jl. Palagan Tentara Pelajar No.67, Ngetiran, Sariharjo, Ngaglik, Sleman Regency, Special Region of Yogyakarta 55581',
                'jam_buka' => $formattedTimeOpen,
                'jam_tutup' => $formattedTimeClosed,
                'image' => '',
            ]);

        Clinic::create(
            [
                'nama' => 'Superglow Clinic',
                'kategori' => 'Klinik',
                'alamat' => 'Jl. Palagan Tentara Pelajar No.Km 7 5, RW.5, Mudal, Sariharjo, Kec. Ngaglik, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55581',
                'jam_buka' => $formattedTimeOpen,
                'jam_tutup' => $formattedTimeClosed,
                'image' => '',

            ]);

        Clinic::create(
            [
                'nama' => 'dr. Lusiana Irene, Sp.OG',
                'kategori' => 'Praktek Dokter',
                'alamat' => 'Jl. Sukun Raya Jl. Plumbon No.10, Modalan, Banguntapan, Kec. Banguntapan, Kabupaten Bantul, Daerah Istimewa Yogyakarta 55198',
                'jam_buka' => $formattedTimeOpen,
                'jam_tutup' => $formattedTimeClosed,
                'image' => '',

            ]);
    }
}
