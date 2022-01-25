<?php

namespace App\Http\Controllers;

use App\Models\Model\PendudukSex;
use Illuminate\Http\Request;

class PendudukSexController extends Controller
{
    public function index()
    {
        $data = [
            "data_penduduk_sex" => PendudukSex::orderBy("nama", "DESC")->withCount('getCountPenduduk')->get()
        ];

        return view("/admin/page/penduduk/sex/data_sex", $data);
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => PendudukSex::where("id", $request->id)->first()
        ];

        return view("/admin/page/penduduk/sex/edit_data_sex", $data);
    }

    public function update(Request $request)
    {
        PendudukSex::where("id", $request->id)->update([
            "nama" => $request->nama
        ]);

        return back()->with('message', "<script>swal('Berhasil!', 'Data Berhasil di Ubah', 'success')</script>");
    }
}
