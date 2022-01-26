<?php

namespace App\Models\Model;

use App\Models\Model\Dusun;
use App\Models\Model\GolonganDarah;
use App\Models\Model\Keluarga;
use App\Models\Model\RTM;
use App\Models\Model\RtmHubungan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $table = "tb_penduduk";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $with = ['getPendidikan', 'getPekerjaan', 'getKawin', 'getHubungan', 'getKelamin', 'getAgama', 'getWargaNegara', 'getDusun' , 'getRt', 'getRw'];

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
        return $this->hasOne(PendudukHubungan::class, "id", "kk_level");
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

    public function getKeluarga()
    {
        return $this->hasOne(Keluarga::class, "nik_kepala", "id_kk");
    }

    public function getHubunganRtm()
    {
        return $this->hasOne(RtmHubungan::class, "id", "rtm_level");
    }

    public function getRtm()
    {
        return $this->hasOne(RTM::class, "no_kk", "id_rtm");
    }

    public function getStatusDasar()
    {
        return $this->hasOne(StatusDasar::class, "id", "id_status_dasar");
    }

}
