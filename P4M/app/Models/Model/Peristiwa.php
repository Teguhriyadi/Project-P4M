<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peristiwa extends Model
{
    use HasFactory;

    protected $table = "tb_peristiwa";

    protected $guarded = [''];

    public $timestamps = false;
}
