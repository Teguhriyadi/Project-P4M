<?php

namespace App\Http\Controllers;

use App\Models\Model\TerakhirLogin;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function dashboard()
    {
        $data = [
            "data_terakhir_login" => TerakhirLogin::orderBy("terakhir_login", "DESC")->paginate(10)
        ];

        return view("/admin/page/home", $data);
    }
}
