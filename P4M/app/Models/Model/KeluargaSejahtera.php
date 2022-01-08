<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeluargaSejahtera extends Model
{
    use HasFactory;

    protected $table = "tb_keluarga_sejahtera";

    protected $guarded = [''];

    public $timestamps = false;
}
