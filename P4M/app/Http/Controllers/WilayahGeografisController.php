<?php

namespace App\Http\Controllers;

use App\Models\Model\Geografis;
use App\Models\Model\WilayahGeografis;
use Illuminate\Http\Request;

class WilayahGeografisController extends Controller
{
    public function index()
    {
        $data = [
            "data_wilayah" => WilayahGeografis::orderBy("batas", "DESC")->get(),
            "data_geografis" => Geografis::select("id")->first()
        ];

        return view("/admin/page/info/wilayah_geografis/data_wilayah_geografis", $data);
    }

    public function store(Request $request)
    {
        $batas = $request->batas;

        $data = WilayahGeografis::where("batas", $batas)->count();

        if ($data) {
            return back()->with('message', "<script>swal('Oops!', 'Tidak Boleh Duplikasi Data', 'error')</script>");
        } else {
            WilayahGeografis::create($request->all());
        }

        return back()->with('message', "<script>swal('Selamat!', 'Data anda berhasil ditambahkan', 'success')</script>");
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => WilayahGeografis::where("id", $request->id)->first()
        ];

        return view("/admin/page/info/wilayah_geografis/edit_data_wilayah_geografis", $data);
    }

    public function update(Request $request)
    {
        $batas = $request->batas;

        $data = WilayahGeografis::where("batas", $batas)->count();

        if ($data) {
            return back()->with('message', "<script>swal('Oops!', 'Tidak Boleh Duplikasi Data', 'error')</script>");
        } else {
            WilayahGeografis::where("id", $request->id)->update([
                "geografis_id" => $request->geografis_id,
                "batas" => $request->batas,
                "desa" => $request->desa,
                "kecamatan" => $request->kecamatan
            ]);
        }

        return back()->with('message', "<script>swal('Selamat!', 'Data anda berhasil diubah', 'success')</script>");
    }

    public function destroy($id)
    {
        WilayahGeografis::where("id", $id)->delete();

        return back()->with('message', "<script>swal('Selamat!', 'Data anda berhasil dihapus', 'success')</script>");
    }
}
