<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendudukPekerjaan extends Model
{
    use HasFactory;

    protected $table = "tb_penduduk_pekerjaan";

    protected $guarded = [''];

    public $timestamps = false;

    public function getCountPenduduk()
    {
        return $this->hasMany(Penduduk::class, 'id_pekerjaan', 'id');
    }
}
