<?php

namespace App\Http\Controllers;

use App\Models\Model\Cacat;
use Illuminate\Http\Request;

class CacatController extends Controller
{
    public function index()
    {
        $data = [
            "data_cacat" => Cacat::orderBy("nama", "DESC")->get()
        ];

        return view("/admin/page/penduduk/cacat/data_cacat", $data);
    }

    public function store(Request $request)
    {
        $cek = Cacat::where("nama", $request->nama)->count();

        if ($cek) {
            return back()->with('message', "<script>swal('Oops', 'Tidak Boleh Duplikasi Data' , 'error')</script>");
        } else {
            Cacat::create($request->all());

            return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Tambahkan', 'success')</script>");
        }
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => Cacat::where("id", $request->id)->first()
        ];

        return view("/admin/page/penduduk/cacat/edit_data_cacat", $data);
    }

    public function update(Request $request)
    {
        Cacat::where("id", $request->id)->update([
            "nama" => $request->nama
        ]);

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Ubah', 'success')</script>");
    }

    public function destroy($id)
    {
        Cacat::where("id", $id)->delete();

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Hapus', 'success')</script>");
    }
}
