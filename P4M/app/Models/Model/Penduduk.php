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
}
