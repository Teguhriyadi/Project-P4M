<?php

namespace Database\Seeders;

use App\Models\Model\KlasifikasiSurat;
use Illuminate\Database\Seeder;

class KlasifikasiSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KlasifikasiSurat::create([
            'kode' => '747',
            'nama' => 'Bidang Kependudukan',
            'status' => 1
        ]);
        KlasifikasiSurat::create([
            'kode' => '300',
            'nama' => 'Keamanan / Ketertiban',
            'status' => 1
        ]);
        KlasifikasiSurat::create([
            'kode' => '472.11',
            'nama' => 'Kelahiran',
            'status' => 1
        ]);
        KlasifikasiSurat::create([
            'kode' => '472.12',
            'nama' => 'Kematian',
            'status' => 1
        ]);
        KlasifikasiSurat::create([
            'kode' => '181.1',
            'nama' => 'Tanah',
            'status' => 1
        ]);
        KlasifikasiSurat::create([
            'kode' => '465',
            'nama' => 'Kesejahteraan Sosial',
            'status' => 1
        ]);
        KlasifikasiSurat::create([
            'kode' => '471.13',
            'nama' => 'Kartu Tanda Penduduk',
            'status' => 1
        ]);
        KlasifikasiSurat::create([
            'kode' => '474.2',
            'nama' => 'Pengembangan Kuantitas Penduduk',
            'status' => 1
        ]);
        KlasifikasiSurat::create([
            'kode' => '471.1',
            'nama' => 'Keterangan Penduduk',
            'status' => 1
        ]);
        KlasifikasiSurat::create([
            'kode' => '470',
            'nama' => 'Kependudukan',
            'status' => 1
        ]);
        KlasifikasiSurat::create([
            'kode' => '500',
            'nama' => 'Perekonomian',
            'status' => 1
        ]);
        KlasifikasiSurat::create([
            'kode' => '471.14',
            'nama' => 'Kartu Keluarga',
            'status' => 1
        ]);
        KlasifikasiSurat::create([
            'kode' => '472.2',
            'nama' => 'Perkawinan, Peceraian Dan Advokasi',
            'status' => 1
        ]);
    }
}
