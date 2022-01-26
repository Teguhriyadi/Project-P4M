<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SakitMenahun extends Model
{
    use HasFactory;

    protected $table = "tb_sakit_menahun";

    protected $guarded = [''];

    public $timestamps = false;

    public function getCountPenduduk()
    {
        return $this->hasMany(Penduduk::class, 'id_sakit_menahun', 'id');
    }

}
