<?php

namespace Database\Seeders;

use App\Models\Model\Geografis;
use Illuminate\Database\Seeder;

class GeografisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Geografis::create([
            'deskripsi' => '<p>Desa Arahan Lor terletak di Daerah Kawasan Indramayu, dengan luas wilayah 280,86 Hektar yang terdiri dari 3 (tiga) Dusun, 6 (enam) Rukun Warga (RW) dan 30 (tiga puluh) Rukun Tetangga (RT) yang merupakan salah satu desa yang berada di wilayah Kecamatan arahan Kabupaten Indramayu. Dengan batas wilayah.</p>'
        ]);
    }
}
