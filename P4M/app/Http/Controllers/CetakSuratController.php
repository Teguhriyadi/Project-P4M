<?php

namespace App\Http\Controllers;

use App\Models\model\Penduduk;
use App\Models\Model\SuratFormat;
use Illuminate\Http\Request;

class CetakSuratController extends Controller
{
    public function data_surat()
    {
        $data = [
            "data_surat" => SuratFormat::all()
        ];

        return view("/admin/page/cetak_surat/data_surat", $data);
    }

    public function form_cetak_surat($url_surat)
    {
        $data = [
            "data_penduduk" => Penduduk::all()
        ];

        return view("/admin/page/cetak_surat/form_cetak_surat", $data);
    }

    public function ambil_data_penduduk(Request $request, $url_surat)
    {
        $data = [
            "data_penduduk" => Penduduk::all(),
            "detail" => Penduduk::where("id", $request->id_penduduk)->first()
        ];

        return view("/admin/page/cetak_surat/form_cetak_surat", $data);
    }
}
