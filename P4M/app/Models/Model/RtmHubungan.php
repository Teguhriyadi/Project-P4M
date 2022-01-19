<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RtmHubungan extends Model
{
    use HasFactory;

    protected $table = "tb_rtm_hubungan";

    protected $guarded = [''];

    public $timestamps = false;
}
