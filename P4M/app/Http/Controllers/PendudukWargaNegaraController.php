<?php

namespace App\Http\Controllers;

use App\Models\Model\PendudukWargaNegara;
use Illuminate\Http\Request;

class PendudukWargaNegaraController extends Controller
{
    public function index()
    {
        $data = [
            "data_penduduk_warga_negara" => PendudukWargaNegara::orderBy("nama", "DESC")->get()
        ];

        return view("/admin/page/penduduk/warga_negara/data_warga_negara", $data);
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => PendudukWargaNegara::where("id", $request->id)->first()
        ];

        return view("/admin/page/penduduk/warga_negara/edit_data_warga_negara", $data);
    }

    public function update(Request $request)
    {
        PendudukWargaNegara::where("id", $request->id)->update([
            "nama" => $request->nama
        ]);

        return back()->with('message', "<script>swal('Berhasil!', 'Data Berhasil di Ubah', 'success')</script>");
    }
}
