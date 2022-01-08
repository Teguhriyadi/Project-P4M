<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSDK extends Model
{
    use HasFactory;

    protected $table = "tb_jenis_sdk";

    protected $guarded = [''];
}
