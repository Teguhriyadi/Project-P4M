<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Model\PendudukPendidikan;

class PendudukPendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PendudukPendidikan::create([
            "nama" => "BELUM MASUK TK/KELOMPOK BERMAIN"
        ]);

        PendudukPendidikan::create([
            "nama" => "SEDANG TK/KELOMPOK BERMAIN"
        ]);

        PendudukPendidikan::create([
            "nama" => "TIDAK PERNAH SEKOLAH"
        ]);

        PendudukPendidikan::create([
            "nama" => "SEDANG SD/SEDERAJAT"
        ]);

        PendudukPendidikan::create([
            "nama" => "TIDAK TAMAT SD/SEDERAJAT"
        ]);
    }
}
