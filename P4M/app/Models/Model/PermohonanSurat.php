<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermohonanSurat extends Model
{
    use HasFactory;

    protected $table = 'tb_permohonan_surat';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function getPenduduk()
    {
        return $this->hasOne(Penduduk::class, 'id', 'nik');
    }

    public function getSurat()
    {
        return $this->hasOne(SuratFormat::class, 'id', 'id_surat');
    }
}
