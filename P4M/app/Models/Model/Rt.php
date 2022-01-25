<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rt extends Model
{
    use HasFactory;

    protected $table = "tb_rt";

    protected $guarded = [''];

    protected $with = ['getRw'];

    public function getCountPenduduk()
    {
        return $this->hasMany(Penduduk::class, 'id_rt', 'id');
    }

    public function getRw()
    {
        return $this->hasOne(Rw::class, 'id', 'id_rw');
    }
}
