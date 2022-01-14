<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Model\Rw;

class RwController extends Controller
{
    public function index()
    {
        $data = [
            "data_rw" => Rw::orderBy("created_at", "DESC")->get()
        ];

        return view("/admin/page/penduduk/rw/data_rw", $data);
    }

    public function store(Request $request)
    {
        Rw::create($request->all());

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Tambahkan', 'success')</script>");
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => Rw::where("id", $request->id)->first()
        ];

        return view("/admin/page/penduduk/rw/edit_data_rw", $data);
    }

    public function update(Request $request)
    {
        Rw::where("id", $request->id)->update([
            "rw" => $request->rw
        ]);

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Ubah', 'success')</script>");
    }

    public function destroy($id)
    {
        Rw::where("id", $id)->delete();

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Hapus', 'success')</script>");
    }
}
