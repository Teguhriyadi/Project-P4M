<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SyaratSurat extends Model
{
    use HasFactory;

    protected $table = "tb_syarat_surat";

    protected $guarded = [''];

    public $timestamps = false;

    public function getSyarat()
    {
        return $this->hasOne(RefSyaratSurat::class, 'id', 'ref_syarat_id');
    }

}
