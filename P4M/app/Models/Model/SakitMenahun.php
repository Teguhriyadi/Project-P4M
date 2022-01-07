<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SakitMenahun extends Model
{
    use HasFactory;

    protected $table = "tb_sakit_menahun";

    protected $guarded = [''];

    public $timestamp = false;
}
