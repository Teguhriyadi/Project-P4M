<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendudukUmur extends Model
{
    use HasFactory;

    protected $table = "tb_penduduk_umur";

    protected $guarded = [''];

    public $timestamps = false;
}
