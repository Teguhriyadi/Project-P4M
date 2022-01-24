<?php

namespace App\Http\Controllers;

use App\Models\Model\PendudukPendidikan;
use Illuminate\Http\Request;

class PendudukPendidikanController extends Controller
{
    public function index()
    {
        $data = [
            'data_penduduk_pendidikan' => PendudukPendidikan::orderBy("nama", "DESC")->withCount('getCountPenduduk')->get()
        ];

        return view("/admin/page/penduduk/pendidikan/index", $data);
    }

    public function store(Request $request)
    {
        PendudukPendidikan::create($request->all());

        return back()->with('message', "<script>swal('Berhasil!', 'Data Berhasil di Tambahkan', 'success')</script>");
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => PendudukPendidikan::where("id", $request->id)->first()
        ];

        return view("/admin/page/penduduk/pendidikan/edit", $data);
    }

    public function update(Request $request)
    {
        PendudukPendidikan::where("id", $request->id)->update([
            "nama" => $request->nama
        ]);

        return back()->with('message', "<script>swal('Berhasil!', 'Data Berhasil di Ubah', 'success')</script>");
    }

    public function destroy($id)
    {
        PendudukPendidikan::where("id", $id)->delete();

        return back()->with('message', "<script>swal('Berhasil!', 'Data Berhasil di Hapus', 'success')</script>");
    }
}
