<?php

namespace App\Models\model;

use App\Models\Model\Dusun;
use App\Models\Model\GolonganDarah;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $table = "tb_penduduk";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $with = ['getPendidikan', 'getPekerjaan', 'getKawin', 'getHubungan', 'getKelamin', 'getAgama', 'getWargaNegara', 'getRt', 'getRw'];

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

    public function getDusun()
    {
        return $this->hasOne(Dusun::class, "id", "id_dusun");
    }

    public function getGolonganDarah()
    {
        return $this->hasOne(GolonganDarah::class, "id", "id_golongan_darah");
    }
    
    public function getRt()
    {
        return $this->hasOne(Rt::class, "id", "id_rt");
    }

    public function getRw()
    {
        return $this->hasOne(Rw::class, "id", "id_rw");
    }

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
