<?php

namespace Database\Seeders;

use App\Models\Model\PendudukStatus;
use Illuminate\Database\Seeder;

class PendudukStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PendudukStatus::create([
            "nama" => "TETAP"
        ]);

        PendudukStatus::create([
            "nama" => "TIDAK TETAP"
        ]);
    }
}
