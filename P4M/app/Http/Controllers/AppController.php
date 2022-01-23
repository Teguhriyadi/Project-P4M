<?php

namespace App\Http\Controllers;

use App\Models\Model\Dusun;
use App\Models\model\Penduduk;
use App\Models\Model\StrukturPemerintahan;
use App\Models\Model\TerakhirLogin;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function dashboard()
    {
        $data = [
            "data_terakhir_login" => TerakhirLogin::orderBy("terakhir_login", "DESC")->paginate(10),
            "data_struktur" => StrukturPemerintahan::orderBy("id", "asc")->get(),
            "data_dusun" => Dusun::count(),
            "data_penduduk" => Penduduk::count(),
        ];

        return view("admin.page.home", $data);
    }

    public function cetakSurat($type = "")
    {
        return view("admin.cetak.surat.".$type);
    }

}
