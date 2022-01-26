<?php

namespace App\Http\Controllers;

use App\Models\Model\Dusun;
use App\Models\Model\Keluarga;
use App\Models\Model\LogSurat;
use App\Models\Model\Penduduk;
use App\Models\Model\Rt;
use App\Models\Model\Rw;
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
            "data_keluarga" => Keluarga::count(),
            "data_arsip" => LogSurat::count()
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

        return view("admin.page.penduduk.ajax.rw", $data);
    }

    public function ambilRt(Request $request)
    {
        $data = [
            'rt' => Rt::where('id_rw', $request->id_rw)->get()
        ];

        return view("admin.page.penduduk.ajax.rt", $data);
    }

}
