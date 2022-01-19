<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisposisiSuratMasuk extends Model
{
    use HasFactory;

    protected $table = "tb_disposisi_surat_masuk";

    protected $guarded = [''];

    public $timestamps = false;
}
