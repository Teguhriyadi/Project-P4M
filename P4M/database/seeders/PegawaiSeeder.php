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
            "nama" => "Dedi S",
            "no_telp" => "123456789",
            "nip" => "123456789",
            "status" => "1",
            "tgl_terdaftar" => date('Y-m-d'),
            "jenis_kelamin" => "L",
            "no_hp" => "12345",
            "alamat" => "Bandung Raya"
        ]);

        Pegawai::create([
            "nik" => "123457",
            "nama" => "Wahyudi",
            "email" => "wahyudi@gmail.com",
            "jenis_kelamin" => "L",
            "no_hp" => "12345",
            "alamat" => "Bandung Raya"
        ]);

        Pegawai::create([
            "nik" => "123458",
            "nama" => "Bambang Tubagus",
            "email" => "bambang@gmail.com",
            "jenis_kelamin" => "L",
            "no_hp" => "12345",
            "alamat" => "Bandung Raya"
        ]);

        Pegawai::create([
            "nik" => "123459",
            "nama" => "Eka K. S.Pd",
            "email" => "eka@gmail.com",
            "jenis_kelamin" => "L",
            "no_hp" => "12345",
            "alamat" => "Bandung Raya"
        ]);

        Pegawai::create([
            "nik" => "123460",
            "nama" => "Sudarno",
            "email" => "sudarno@gmail.com",
            "jenis_kelamin" => "L",
            "no_hp" => "12345",
            "alamat" => "Bandung Raya"
        ]);

        Pegawai::create([
            "nik" => "123461",
            "nama" => "Heryani",
            "email" => "heryani@gmail.com",
            "jenis_kelamin" => "P",
            "no_hp" => "12345",
            "alamat" => "Bandung Raya"
        ]);

        Pegawai::create([
            "nik" => "123462",
            "nama" => "Cah Abdul Soleh",
            "email" => "abdul@gmail.com",
            "jenis_kelamin" => "L",
            "no_hp" => "12345",
            "alamat" => "Bandung Raya"
        ]);

        Pegawai::create([
            "nik" => "123463",
            "nama" => "Kalimatusadiyah",
            "email" => "kalimatusadiyah@gmail.com",
            "jenis_kelamin" => "P",
            "no_hp" => "12345",
            "alamat" => "Bandung Raya"
        ]);

        Pegawai::create([
            "nik" => "123464",
            "nama" => "Rio Herdiawan",
            "email" => "rio@gmail.com",
            "jenis_kelamin" => "L",
            "no_hp" => "12345",
            "alamat" => "Bandung Raya"
        ]);

        Pegawai::create([
            "nik" => "123465",
            "nama" => "Kuniasih",
            "email" => "kurniasih@gmail.com",
            "jenis_kelamin" => "P",
            "no_hp" => "12345",
            "alamat" => "Bandung Raya"
        ]);
    }
}
