<?php

namespace App\Http\Controllers;

use App\Models\Model\Dusun;
use App\Models\model\Penduduk;
use App\Models\model\Rt;
use App\Models\model\Rw;
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

    public function combobox()
    {
        $data = [
            'dusun' => Dusun::all()
        ];
        return view('coba.combobox', $data);
    }

    public function ambilRw(Request $request)
    {
        $data = [
            'rw' => Rw::where('id_dusun', $request->id_dusun)->get()
        ];
        return view('coba.rw', $data);
    }

    public function ambilRt(Request $request)
    {
        $data = [
            'rt' => Rt::where('id_rw', $request->id_rw)->get()
        ];
        return view('coba.rt', $data);
    }

}
