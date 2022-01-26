<?php

namespace App\Http\Controllers;

use App\Models\Model\Peta;
use Illuminate\Http\Request;

class PetaController extends Controller
{
    public function desa()
    {
        $desa = Peta::select("id", "wilayah_desa")->first();

        return view("admin/page/peta/desa", compact('desa'));
    }

    public function desaUpdate(Request $request)
    {
        $cek = Peta::where("id", $request->id)->first();

        if ($cek) {
            Peta::where("id", $cek->id)->update(['wilayah_desa'=>$request->url]);

            return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil Disimpan', 'success')</script>");
        }
    }

    public function desaStore(Request $request)
    {
        Peta::create(['wilayah_desa' => $request->url]);

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil Ditambah'success')</script>");
    }

    public function kantor()
    {
        $kantor = Peta::select("id", "lokasi_kantor")->first();
        $kantor_desa = Peta::select("id", "lokasi_kantor")->where("lokasi_kantor", NULL)->first();

        return view("admin/page/peta/kantor", compact('kantor', 'kantor_desa'));
    }

    public function kantorUpdate(Request $request)
    {
        $cek = Peta::where("id", $request->id)->first();

        if ($cek) {
            Peta::where("id", $cek->id)->update(['lokasi_kantor'=>$request->url]);

            return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil Disimpan', 'success')</script>");
        }
    }

    public function kantorStore(Request $request)
    {
        Peta::create(['lokasi_kantor' => $request->url]);

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil Ditambah'success')</script>");
    }
}
