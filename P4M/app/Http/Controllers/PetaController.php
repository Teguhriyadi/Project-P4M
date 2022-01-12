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

            return back();
        }
    }

    public function desaStore(Request $request)
    {
        Peta::create(['wilayah_desa' => $request->url]);

        return back();
    }

    public function kantor()
    {
        $kantor = Peta::select("id", "lokasi_kantor")->first();

        return view("admin/page/peta/kantor", compact('kantor'));
    }

    public function kantorUpdate(Request $request)
    {
        $cek = Peta::where("id", $request->id)->first();

        if ($cek) {
            Peta::where("id", $cek->id)->update(['lokasi_kantor'=>$request->url]);

            return back();
        }
    }

    public function kantorStore(Request $request)
    {
        Peta::create(['lokasi_kantor' => $request->url]);

        return back();
    }
}
