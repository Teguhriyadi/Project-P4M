<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrukturPemerintahan extends Model
{
    use HasFactory;

    protected $table = "tb_struktur_pemerintahan";

    protected $guarded = [''];

    protected $with = ['getJabatan' , 'getPegawai'];

    public function getJabatan()
    {
        return $this->belongsTo("App\Models\Model\Jabatan", "jabatan_id", "id");
    }

    public function getPegawai()
    {
        return $this->belongsTo("App\Models\Model\Pegawai", "pegawai_id", "id");
    }
}
