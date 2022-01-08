<?php

namespace Database\Seeders;

use App\Models\Model\PendudukPekerjaan;
use Illuminate\Database\Seeder;

class PendudukPekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PendudukPekerjaan::create([
            "nama" => "BELUM/TIDAK BEKERJA"
        ]);

        PendudukPekerjaan::create([
            "nama" => "MENGURUS RUMAH TANGGA"
        ]);

        PendudukPekerjaan::create([
            "nama" => "PELAJAR/MAHASISWA"
        ]);

        PendudukPekerjaan::create([
            "nama" => "PENSIUNAN"
        ]);

        PendudukPekerjaan::create([
            "nama" => "PEGAWAI NEGERI SIPIL(PNS)"
        ]);
    }
}
