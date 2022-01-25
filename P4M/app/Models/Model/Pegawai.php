<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = "tb_pegawai";

    protected $guarded = [''];

    public function getKelamin()
    {
        return $this->hasOne(PendudukSex::class, 'id', 'sex');
    }

    public function getPenduduk()
    {
        return $this->hasOne(Penduduk::class, "id", "id_penduduk");
    }

}
