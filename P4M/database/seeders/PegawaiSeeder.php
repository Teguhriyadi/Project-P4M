<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Model\Pegawai;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pegawai::create([
            "nik" => "123456",
            "nama" => "Mohammad Ilham Teguhriyadi",
            "email" => "ilham.teguh55@gmail.com",
            "jenis_kelamin" => "L",
            "no_hp" => "12345",
            "alamat" => "Bandung Raya"
        ]);

        Pegawai::create([
            "nik" => "123457",
            "nama" => "Ahmad Fauzi",
            "email" => "ahmad.fauzi@gmail.com",
            "jenis_kelamin" => "L",
            "no_hp" => "12345",
            "alamat" => "Bandung Raya"
        ]);

        Pegawai::create([
            "nik" => "123458",
            "nama" => "Teguhriyadi",
            "email" => "teguhriyadi@gmail.com",
            "jenis_kelamin" => "L",
            "no_hp" => "12345",
            "alamat" => "Bandung Raya"
        ]);

        Pegawai::create([
            "nik" => "123459",
            "nama" => "Riyadi",
            "email" => "riyadi@gmail.com",
            "jenis_kelamin" => "L",
            "no_hp" => "12345",
            "alamat" => "Bandung Raya"
        ]);

        Pegawai::create([
            "nik" => "123460",
            "nama" => "Ahmad",
            "email" => "ahmad@gmail.com",
            "jenis_kelamin" => "L",
            "no_hp" => "12345",
            "alamat" => "Bandung Raya"
        ]);
    }
}
