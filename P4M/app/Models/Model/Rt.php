<?php

namespace App\Models\model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rt extends Model
{
    use HasFactory;

    protected $table = "tb_rt";

    protected $fillable = ['rt', 'id_pejabat'];

    public function getCountPenduduk()
    {
        return $this->hasMany(Penduduk::class, 'id_rt', 'id');
    }

    public function getRw()
    {
        return $this->hasOne(Rw::class, 'id', 'id_rw');
    }
}
