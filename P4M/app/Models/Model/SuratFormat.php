<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratFormat extends Model
{
    use HasFactory;

    protected $table = "tb_surat_format";

    protected $guarded = [''];

    public $timestamps = false;

    protected $with = ["getKlasifikasi"];

    public function getKlasifikasi()
    {
        return $this->hasOne("App\Models\Model\KlasifikasiSurat", "kode", "kode_surat");
    }
}
