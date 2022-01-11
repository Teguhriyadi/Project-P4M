<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendudukHubungan extends Model
{
    use HasFactory;

    protected $table = "tb_penduduk_hubungan";

    protected $guarded = [''];

    public $timestamps = false;
}
