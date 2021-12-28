<?php

namespace App\Http\Controllers;

use App\Models\Model\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $data = [
            "data_kontak" => Kontak::orderBy("created_at", "DESC")->get()
        ];

        return view("admin/page/kontak/index", $data);
    }
}
