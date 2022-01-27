<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendidikanYangSedangDitempuh extends Model
{
    use HasFactory;

    protected $table = "tb_penduduk_pendidikan_yang_sedang_ditempuh";

    protected $guarded = [''];

    public $timestamps = false;

    public function getCountPenduduk()
    {
        return $this->hasMany(Penduduk::class, 'id_pendidikan', 'id');
    }
}
