<?php

namespace App\Http\Controllers;

use App\Models\Model\PendudukAgama;
use Illuminate\Http\Request;

class PendudukAgamaController extends Controller
{
    public function index()
    {
        $data = [
            "data_penduduk_agama" => PendudukAgama::orderBy("nama", "DESC")->withCount('getCountPenduduk')->get()
        ];

        return view("/admin/page/penduduk/agama/data_agama", $data);
    }

    public function store(Request $request)
    {
        PendudukAgama::create($request->all());

        return back()->with('message', "<script>swal('Berhasil!', 'Data Berhasil di Tambahkan', 'success')</script>");
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => PendudukAgama::where("id", $request->id)->first()
        ];

        return view("/admin/page/penduduk/agama/edit_data_agama", $data);
    }

    public function update(Request $request)
    {
        PendudukAgama::where("id", $request->id)->update([
            "nama" => $request->nama
        ]);

        return back()->with('message', "<script>swal('Berhasil!', 'Data Berhasil di Ubah', 'success')</script>");
    }

    public function destroy($id)
    {
        PendudukAgama::where("id", $id)->delete();

        return back()->with('message', "<script>swal('Berhasil!', 'Data Berhasil di Hapus', 'success')</script>");
    }
}
