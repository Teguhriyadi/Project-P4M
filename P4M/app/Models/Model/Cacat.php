<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cacat extends Model
{
    use HasFactory;

    protected $table = "tb_cacat";

    protected $guarded = [''];

    public $timestamps = false;

    public function getCountPenduduk()
    {
        return $this->hasMany(Penduduk::class, 'id_cacat', 'id');
    }

}
