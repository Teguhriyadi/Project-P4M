<?php

namespace Database\Seeders;

use App\Models\Model\GolonganDarah;
use Illuminate\Database\Seeder;

class GolonganDarahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GolonganDarah::create([
            "nama" => "A"
        ]);

        GolonganDarah::create([
            "nama" => "B"
        ]);

        GolonganDarah::create([
            "nama" => "AB"
        ]);

        GolonganDarah::create([
            "nama" => "O"
        ]);
    }
}
