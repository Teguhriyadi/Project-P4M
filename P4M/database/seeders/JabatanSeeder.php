<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Model\Jabatan;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jabatan::create([
            "nama_jabatan" => "Kuwu"
        ]);

        Jabatan::create([
            "nama_jabatan" => "Kaur Perencanaan"
        ]);

        Jabatan::create([
            "nama_jabatan" => "Juru Tulis"
        ]);

        Jabatan::create([
            "nama_jabatan" => "Kaur TU"
        ]);

        Jabatan::create([
            "nama_jabatan" => "Kaur Keuangan"
        ]);
    }
}
