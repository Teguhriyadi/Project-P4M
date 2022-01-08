<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peta extends Model
{
    use HasFactory;

    protected $table = "tb_peta";

    protected $guarded = [''];

    public $timestamps = false;

}
