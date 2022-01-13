<?php

namespace App\Http\Controllers;

use App\Models\Model\PendudukPekerjaan;
use Illuminate\Http\Request;

class PendudukPekerjaanController extends Controller
{
    public function index()
    {
        $data = [
            "data_penduduk_pekerjaan" => PendudukPekerjaan::orderBy("nama", "DESC")->withCount('getCountPenduduk')->get()
        ];

        return view("/admin/page/penduduk/pekerjaan/data_pekerjaan", $data);
    }

    public function store(Request $request)
    {
        PendudukPekerjaan::create($request->all());

        return back()->with('message', "<script>swal('Berhasil!', 'Data Berhasil di Tambahkan', 'success')</script>");
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => PendudukPekerjaan::where("id", $request->id)->first()
        ];

        return view("/admin/page/penduduk/pekerjaan/edit_data_pekerjaan", $data);
    }

    public function update(Request $request)
    {
        PendudukPekerjaan::where("id", $request->id)->update([
            "nama" => $request->nama
        ]);

        return back()->with('message', "<script>swal('Berhasil!', 'Data Berhasil di Ubah', 'success')</script>");
    }

    public function destroy($id)
    {
        PendudukPekerjaan::where("id", $id)->delete();

        return back()->with('message', "<script>swal('Berhasil!', 'Data Berhasil di Hapus', 'success')</script>");
    }
}
