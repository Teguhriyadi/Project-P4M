<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WargaNegara extends Model
{
    use HasFactory;

    protected $table = "tb_warga_negara";

    protected $guarded = [''];

    public $timestamps = false;
}
