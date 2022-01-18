<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusDasar extends Model
{
    use HasFactory;

    protected $table = "tb_status_dasar";

    protected $guarded = [''];

    public $timestamps = false;
}
