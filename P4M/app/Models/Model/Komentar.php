<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    protected $table = 'tb_komentar';

    protected $guarded = [''];

    public function getArtikel()
    {
        return $this->hasOne(Artikel::class, 'id', 'id_artikel');
    }
}
