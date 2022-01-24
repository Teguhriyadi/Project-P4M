<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogSurat extends Model
{
    use HasFactory;

    protected $table = "tb_log_surat";

    protected $guarded = [''];

    public $timestamps = false;

    protected $with = ['getSuratFormat', 'getPenduduk', 'getPegawai'];

    public function getSuratFormat()
    {
        return $this->hasOne(SuratFormat::class, "id", "id_format_surat");
    }

    public function getPenduduk()
    {
        return $this->hasOne(Penduduk::class, "id", "id_penduduk");
    }

    public function getUser()
    {
        return $this->hasOne("App\Models\User", "id", "id_user");
    }

    public function getPegawai()
    {
        return $this->hasOne(Pegawai::class, "id", "id_pegawai");
    }

    public function getFormatSurat()
    {
        return $this->hasOne(SuratFormat::class, "id", "id_format_surat");
    }
}
