<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GolonganDarah extends Model
{
    use HasFactory;

    protected $table = "tb_golongan_darah";

    protected $guarded = [''];

    public $timestamps = false;

    public function getCountPenduduk()
    {
        return $this->hasMany(Penduduk::class, 'id_golongan_Darah', 'id');
    }
}
