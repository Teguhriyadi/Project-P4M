<?php

namespace Database\Seeders;

use App\Models\Model\HakAkses;
use Illuminate\Database\Seeder;

class HakAksesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HakAkses::create([
            "nama_hak_akses" => "Administrator"
        ]);

        HakAkses::create([
            "nama_hak_akses" => "Super Admin"
        ]);

    }
}
