<?php

namespace App\Models\model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $table = "tb_penduduk";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function getPendidikan()
    {
        return $this->hasOne(PendudukPendidikan::class, "id", "id_pendidikan");
    }

    public function getPekerjaan()
    {
        return $this->hasOne(PendudukPekerjaan::class, "id", "id_pekerjaan");
    }
    
    public function getKawin()
    {
        return $this->hasOne(PendudukKawin::class, "id", "status_kawin");
    }
    
    public function getHubungan()
    {
        return $this->hasOne(PendudukHubungan::class, "id", "id_hubungan");
    }
    
    public function getKelamin()
    {
        return $this->hasOne(PendudukSex::class, "id", "id_sex");
    }
    
    public function getAgama()
    {
        return $this->hasOne(PendudukAgama::class, "id", "id_agama");
    }
    
    public function getWargaNegara()
    {
        return $this->hasOne(PendudukWargaNegara::class, "id", "id_warga_negara");
    }

    // Dusun

    // RT

    // RW

    public function getStatusHidup($id)
    {
        $data = array(
            1 => 'HIDUP',
            2 => 'MENINGGAL'
        );

        $hasil = $data[$id];

        return $hasil;
    }
}
