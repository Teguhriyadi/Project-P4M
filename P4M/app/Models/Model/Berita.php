<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Berita extends Model
{
    use HasFactory, Sluggable;

    protected $table = "tb_berita";

    protected $guarded = ['id'];

    protected $with = ["getCategory"];

    public function getCategory()
    {
        return $this->belongsTo("App\Models\Model\Kategori", "kategori_id", "id");
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }

}
