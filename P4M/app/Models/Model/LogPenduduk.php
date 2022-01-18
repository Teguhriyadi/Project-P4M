<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogPenduduk extends Model
{
    use HasFactory;

    protected $table = "tb_log_penduduk";

    protected $guarded = [''];

}
