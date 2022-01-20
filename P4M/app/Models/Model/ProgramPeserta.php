<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramPeserta extends Model
{
    use HasFactory;

    protected $table = "tb_program_peserta";

    protected $guarded = [''];

    public $timestamps = false;
}
