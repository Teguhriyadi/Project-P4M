<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendudukPendidikan extends Model
{
    use HasFactory;

    protected $table = "tb_penduduk_pendidikan";

    protected $guarded = [''];

    public $timestamps = false;

    public function getCountPenduduk()
    {
        return $this->hasMany(Penduduk::class, 'id_pendidikan', 'id');
    }
}
