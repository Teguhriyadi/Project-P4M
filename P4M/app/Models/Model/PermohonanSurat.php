<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermohonanSurat extends Model
{
    use HasFactory;

    protected $table = 'tb_permohonan_surat';

    protected $guarded = ['id', 'created_at', 'updated_at'];
}
