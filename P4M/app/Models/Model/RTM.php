<?php

namespace App\Models\Model;

use App\Models\model\Penduduk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RTM extends Model
{
    use HasFactory;

    protected $table = "tb_rtm";

    protected $guarded = [''];

    public function getDataPenduduk()
    {
        return $this->hasOne(Penduduk::class, "id", "nik_kepala");
    }

}
