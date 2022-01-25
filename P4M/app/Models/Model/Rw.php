<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{
    use HasFactory;

    protected $table = "tb_rw";

    protected $fillable = ['rw', 'id_pejabat'];

    protected $with = ['getDusun'];

    public function getCountPenduduk()
    {
        return $this->hasMany(Penduduk::class, 'id_rw', 'id');
    }

    public function getDusun()
    {
        return $this->belongsTo("App\Models\Model\Dusun", 'id_dusun', 'id');
    }
}
