<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $table = "tb_artikel";

    protected $guarded = [''];

    protected $with = ["getCategory"];

    public function getCategory()
    {
        return $this->belongsTo("App\Models\Model\Kategori", "kategori_id", "id");
    }

    public function getCount()
    {
        return $this->hasMany(Counter::class, 'id_artikel', 'id');
    }

    public function getKomentar()
    {
        return $this->hasMany(Komentar::class, 'id_artikel', 'id');
    }

}
