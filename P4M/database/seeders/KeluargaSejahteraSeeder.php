<?php

namespace Database\Seeders;

use App\Models\Model\KeluargaSejahtera;
use Illuminate\Database\Seeder;

class KeluargaSejahteraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KeluargaSejahtera::create([
            "nama" => "Keluarga Pra Sejahtera"
        ]);

        KeluargaSejahtera::create([
            "nama" => "Keluarga Sejahtera I"
        ]);

        KeluargaSejahtera::create([
            "nama" => "Keluarga Sejahtera II"
        ]);

        KeluargaSejahtera::create([
            "nama" => "Keluarga Sejahtera III"
        ]);

        KeluargaSejahtera::create([
            "nama" => "Keluarga Sejahtera III Plus"
        ]);
    }
}
