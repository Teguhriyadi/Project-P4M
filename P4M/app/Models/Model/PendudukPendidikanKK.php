<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendudukPendidikanKK extends Model
{
    use HasFactory;

    protected $table = "tb_penduduk_pendidikan_kk";

    protected $guarded = [''];

    public $timestamps = false;
}
