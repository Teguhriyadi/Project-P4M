<?php

namespace App\Http\Controllers;

use App\Models\Model\StrukturPemerintahan;
use App\Models\Model\TerakhirLogin;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function dashboard()
    {
        $data = [
            "data_terakhir_login" => TerakhirLogin::orderBy("terakhir_login", "DESC")->paginate(10),
            "data_struktur" => StrukturPemerintahan::orderBy("id", "asc")->get()
        ];

        return view("/admin/page/home", $data);
    }

    public function json()
    {
        $data_struktur = StrukturPemerintahan::orderBy("id", "asc")->get();

        $data = array();

        foreach ($data_struktur as $struktur) {
            if ($struktur->staf_id == 1) {
                $data[] = array(
                    'pegawai' => $struktur->getPegawai->nama,
                    'jabatan' => $struktur->getJabatan->nama_jabatan, 
                );
            } else {
                if ($struktur->staf_id == 2) {
                    $data[] = array(
                        'child' => array(
                            'pegawai' => $struktur->getPegawai->nama,
                            'jabatan' => $struktur->getJabatan->nama_jabatan,
                        )
                    );
                } else {
                    $data[] = array(
                        'child' => array(
                            'pegawai' => $struktur->getPegawai->nama,
                            'jabatan' => $struktur->getJabatan->nama_jabatan,
                        )
                    );
                }
            }
        }

        return response()->json($data);
    }
}
