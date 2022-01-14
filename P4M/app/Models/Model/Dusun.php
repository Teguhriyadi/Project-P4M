<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dusun extends Model
{
    use HasFactory;

    protected $table = "tb_dusun";

    protected $guarded = [''];

    public function getCountPenduduk()
    {
        return $this->hasMany(Penduduk::class, 'id_dusun', 'id');
    }
}
