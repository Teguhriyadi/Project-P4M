<?php

namespace Database\Seeders;

use App\Models\model\Penduduk;
use Illuminate\Database\Seeder;

class PendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Penduduk::create([
            "nama" => "Mohammad Ilham Teguhriyadi",
            "nik" => "12345678910",
            "id_dusun" => 1,
            "id_rt" => 1,
            "id_rw" => 1
        ]);

        Penduduk::create([
            "nama" => "Mohammad",
            "nik" => "12345678911",
            "id_dusun" => 1,
            "id_rt" => 1,
            "id_rw" => 1
        ]);

        Penduduk::create([
            "nama" => "Ilham",
            "nik" => "12345678912",
            "id_dusun" => 1,
            "id_rt" => 1,
            "id_rw" => 1
        ]);

        Penduduk::create([
            "nama" => "Teguhriyadi",
            "nik" => "12345678913",
            "id_dusun" => 1,
            "id_rt" => 1,
            "id_rw" => 1
        ]);

        Penduduk::create([
            "nama" => "Ahmad",
            "nik" => "12345678914",
            "id_dusun" => 1,
            "id_rt" => 1,
            "id_rw" => 1
        ]);
    }
}
