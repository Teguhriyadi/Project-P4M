<?php

namespace App\Models\model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coba extends Model
{
    use HasFactory;

    protected $table = "tb_coba";

    protected $guarded = ['id', 'created_at', 'updated_at'];
}
