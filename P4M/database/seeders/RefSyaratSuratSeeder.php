<?php

namespace Database\Seeders;

use App\Models\Model\RefSyaratSurat;
use Illuminate\Database\Seeder;

class RefSyaratSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RefSyaratSurat::create([
            'ref_syarat_nama' => 'Surat Pengantar RT/RW'
        ]);
        RefSyaratSurat::create([
            'ref_syarat_nama' => 'Fotokopi KK'
        ]);
        RefSyaratSurat::create([
            'ref_syarat_nama' => 'Fotokopi KTP'
        ]);
        RefSyaratSurat::create([
            'ref_syarat_nama' => 'Fotokopi Surat Nikah/Akta Nikah/Kutipan Akta Perkawinan'
        ]);
        RefSyaratSurat::create([
            'ref_syarat_nama' => 'Fotokopi Akta Kelahiran/Surat Kelahiran bagi keluarga yang mempunyai anak'
        ]);
        RefSyaratSurat::create([
            'ref_syarat_nama' => 'Surat Pindah Datang dari tempat asal'
        ]);
        RefSyaratSurat::create([
            'ref_syarat_nama' => 'Surat Keterangan Kematian dari Rumah Sakit, Rumah Bersalin Puskesmas, atau visum Dokter'
        ]);
        RefSyaratSurat::create([
            'ref_syarat_nama' => 'Surat Keterangan Cerai'
        ]);
        RefSyaratSurat::create([
            'ref_syarat_nama' => 'Fotokopi Ijasah Terakhir'
        ]);
        RefSyaratSurat::create([
            'ref_syarat_nama' => 'SK. PNS/KARIP/SK. TNI – POLRI'
        ]);
        RefSyaratSurat::create([
            'ref_syarat_nama' => 'Surat Keterangan Kematian dari Kepala Desa/Kelurahan'
        ]);
        RefSyaratSurat::create([
            'ref_syarat_nama' => 'Surat imigrasi / STMD (Surat Tanda Melapor Diri)'
        ]);
    }
}
