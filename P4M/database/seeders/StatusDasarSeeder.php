<?php

namespace Database\Seeders;

use App\Models\Model\StatusDasar;
use Illuminate\Database\Seeder;

class StatusDasarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusDasar::create([
            "nama" => "HIDUP"
        ]);

        StatusDasar::create([
            "nama" => "MATI"
        ]);

        StatusDasar::create([
            "nama" => "PINDAH"
        ]);

        StatusDasar::create([
            "nama" => "HILANG"
        ]);

        StatusDasar::create([
            "nama" => "PERGI"
        ]);

        StatusDasar::create([
            "nama" => "TIDAK VALID"
        ]);
    }
}
