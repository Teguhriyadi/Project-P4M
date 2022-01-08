<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendudukStatus extends Model
{
    use HasFactory;

    protected $table = "tb_penduduk_status";

    protected $guarded = [''];

    public $timestamps = false;

}
