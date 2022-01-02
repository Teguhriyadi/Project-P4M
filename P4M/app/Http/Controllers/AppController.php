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
            $data[] = array(
                'id' => $struktur->id,
                'pegawai' => $struktur->getPegawai->nama,
                'jabatan' => $struktur->getJabatan->nama_jabatan,
                'staf' => $struktur->staf_id
            );
        }

        // for ($i=0; $i < count($data_struktur); $i++) { 
        //     $cek = $data_struktur[$i];

        //     if ($i==0) {
        //         echo $cek['id'];
        //     } else {
        //         if (strlen($cek['staf_id']) <= 0) {
        //             echo $cek['id'];
        //         } else {
        //             echo $cek['id'];
        //         }
        //     }
        // }
        
        return response()->json($data);
    }
}
