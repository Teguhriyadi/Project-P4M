<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendudukWargaNegara extends Model
{
    use HasFactory;

    protected $table = "tb_penduduk_warga_negara";

    protected $guarded = [''];

    public $timestamps = false;

    // protected $with = [];

    public function getCountPenduduk()
    {
        return $this->hasMany(Penduduk::class, 'id_warga_negara', 'id');
    }
}
