<?php

namespace App\Http\Controllers;

use App\Models\Model\JenisSDA;
use Illuminate\Http\Request;

class PotensiController extends Controller
{
    public function index()
    {
        $data = [
            "data_sda" => JenisSDA::orderBy("jenis", "DESC")->get()
        ];

        return view("admin/page/potensi/index", $data);
    }
}
