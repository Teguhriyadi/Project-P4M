<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendudukKawin extends Model
{
    use HasFactory;

    protected $table = "tb_penduduk_kawin";

    protected $guarded = [''];

    public $timestamps = false;
}
