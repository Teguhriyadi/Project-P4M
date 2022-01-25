<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{
    use HasFactory;

    protected $table = "tb_rw";

    protected $guarded = [''];

    protected $with = ['getDusun'];

    public function getCountPenduduk()
    {
        return $this->hasMany(Penduduk::class, 'id_rw', 'id');
    }

    public function getDusun()
    {
        return $this->hasOne(Dusun::class, 'id', 'id_dusun');
    }
}
