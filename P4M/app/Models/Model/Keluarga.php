<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    use HasFactory;

    protected $table = "tb_keluarga";

    protected $guarded = [''];

    public $timestamps = false;

    public function getDataPenduduk() {
        return $this->hasOne("App\Models\Model\Penduduk", "id", "nik_kepala");
    }

}
