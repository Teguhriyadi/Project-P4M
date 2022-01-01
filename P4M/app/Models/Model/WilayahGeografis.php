<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WilayahGeografis extends Model
{
    use HasFactory;

    protected $table = "tb_wilayah_geografis";

    protected $guarded = [''];

    public $timestamps = false;
}
