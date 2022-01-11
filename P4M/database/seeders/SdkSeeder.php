<?php

namespace Database\Seeders;

use App\Models\Model\JenisSDK;
use Illuminate\Database\Seeder;

class SdkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisSDA::create([
            'jenis_organisasi' => 'Badan Permusyawaratan Desa (BPD)',
            'jumlah_anggota' => 11,
            'lokasi' => '1',
            'tahun_id' => 1
        ]);

        JenisSDA::create([
            'jenis_organisasi' => 'MUI',
            'jumlah_anggota' => 5,
            'lokasi' => '1',
            'tahun_id' => 1
        ]);
    }
}
