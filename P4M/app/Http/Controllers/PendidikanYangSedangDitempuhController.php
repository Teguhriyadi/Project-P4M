<?php

namespace App\Http\Controllers;

use App\Models\Model\PendidikanYangSedangDitempuh;
use Illuminate\Http\Request;

class PendidikanYangSedangDitempuhController extends Controller
{
    public function index()
    {
        $data = [
            'data_pendidikan_yang_sedang_ditempuh' => PendidikanYangSedangDitempuh::orderBy("nama", "DESC")->withCount('getCountPenduduk')->get()
        ];

        return view("/admin/page/penduduk/pendidikan_yang_sedang_ditempuh/index", $data);
    }

    public function store(Request $request)
    {
        PendidikanYangSedangDitempuh::create($request->all());

        return back()->with('message', "<script>swal('Berhasil!', 'Data Berhasil di Tambahkan', 'success')</script>");
    }

    public function edit(Request $request)
    {
        echo $request->id;
        die;
        $data = [
            "edit" => PendidikanYangSedangDitempuh::where("id", $request->id)->first()
        ];

        return view("/admin/page/penduduk/pendidikan_yang_sedang_ditempuh/edit", $data);
    }

    public function update(Request $request)
    {
        PendidikanYangSedangDitempuh::where("id", $request->id)->update([
            "nama" => $request->nama
        ]);

        return back()->with('message', "<script>swal('Berhasil!', 'Data Berhasil di Ubah', 'success')</script>");
    }

    public function destroy($id)
    {
        PendidikanYangSedangDitempuh::where("id", $id)->delete();

        return back()->with('message', "<script>swal('Berhasil!', 'Data Berhasil di Hapus', 'success')</script>");
    }
}
