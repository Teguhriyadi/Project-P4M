<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeksBerjalan extends Model
{
    use HasFactory;

    protected $table = "tb_teks_berjalan";

    protected $guarded = [''];
}
