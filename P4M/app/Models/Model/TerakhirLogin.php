<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TerakhirLogin extends Model
{
    use HasFactory;

    protected $table = "tb_terakhir_login";

    protected $guarded = [''];

    public $timestamps = false;
}
