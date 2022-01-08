<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefPindah extends Model
{
    use HasFactory;

    protected $table = "tb_ref_pindah";

    protected $guarded = [''];

    public $timestamps = false;
}
