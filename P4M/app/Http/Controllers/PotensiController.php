<?php

namespace App\Http\Controllers;

use App\Models\Model\JenisSDA;
use App\Models\Model\JenisSDK;
use Illuminate\Http\Request;

class PotensiController extends Controller
{
    public function index()
    {
        $data = [
            "data_sda" => JenisSDA::orderBy("jenis", "DESC")->get(),
            "data_sdk" => JenisSDK::orderBy("jenis_organisasi", "DESC")->get()
        ];

        return view("admin/page/potensi/index", $data);
    }
}
