<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendudukAsuransi extends Model
{
    use HasFactory;

    protected $table = "tb_penduduk_asuransi";

    protected $guarded = [''];

    public $timestamps = false;
}
