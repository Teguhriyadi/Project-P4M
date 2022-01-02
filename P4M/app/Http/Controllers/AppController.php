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

    public function ubah(Request $request)
    {
        $cek = StrukturPemerintahan::where("id", $request->id)->update([
            "staf_id" => $request->staf_id
        ]);

        if ($cek) {
            echo 1;
        } else {
            echo 2;
        }
    }

    public function json()
    {
        $data_struktur = StrukturPemerintahan::orderBy("id", "asc")->get();

        $data = array();

        foreach ($data_struktur as $struktur) {
            $data[] = array(
                'id' => $struktur->id,
                'pid' => $struktur->staf_id,
                'name' => $struktur->getPegawai->nama,
                'title' => $struktur->getJabatan->nama_jabatan,
            );
        }

        // for ($i=0; $i < count($data_struktur); $i++) { 
        //     $cek = $data_struktur[$i];

        //     if ($i==0) {
        //         $data[] = array(
        //             'id' => $cek['id'],
        //             'pegawai' => $cek['getPegawai']['nama'],
        //             'jabatan' => $cek['getJabatan']['nama_jabatan'],
        //             'staf' => $cek['staf_id'],
        //         );
        //     } else {
        //         if (strlen($cek['staf_id']) <= 0) {
        //            $data[] = array(
        //                 'id' => $cek['id'],
        //                 'pegawai' => $cek['getPegawai']['nama'],
        //                 'jabatan' => $cek['getJabatan']['nama_jabatan'],
        //                 'staf' => $cek['staf_id'],
        //             );
        //         } else {
        //            $data['children'] = array(
        //                 'id' => $cek['id'],
        //                 'pegawai' => $cek['getPegawai']['nama'],
        //                 'jabatan' => $cek['getJabatan']['nama_jabatan'],
        //                 'staf' => $cek['staf_id'],
        //             );
        //         }
        //     }
        // }
        
        return response()->json($data);
    }
}
