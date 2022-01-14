<?php

namespace App\Models\model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{
    use HasFactory;

    protected $table = "tb_rw";

    protected $fillable = ['rw', 'id_pejabat'];
}
