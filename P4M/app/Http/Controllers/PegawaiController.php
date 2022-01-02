<?php

namespace App\Http\Controllers;

use App\Models\Model\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $data = [
            "data_pegawai" => Pegawai::orderBy("nama", "DESC")->get()
        ];

        return view("admin/page/pegawai/index", $data);
    }

    public function store(Request $request)
    {
        Pegawai::create($request->all());

        return back()->with('message', "<script>swal('Selamat!', 'Data anda berhasil ditambahkan', 'success')</script>");
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => Pegawai::where("id", $request->id)->first()
        ];

        return view("/admin/page/pegawai/edit", $data);
    }

    public function update(Request $request)
    {
        Pegawai::where("id", $request->id)->update([
            "nik" => $request->nik,
            "nama" => $request->nama,
            "email" => $request->email,
            "jenis_kelamin" => $request->jenis_kelamin,
            "no_hp" => $request->no_hp,
            "alamat" => $request->alamat
        ]);

        return back()->with('message', "<script>swal('Selamat!', 'Data anda berhasil diubah', 'success')</script>");
    }

    public function destroy($id)
    {
        Pegawai::where("id", $id)->delete();

        return back()->with('message', "<script>swal('Selamat!', 'Data anda berhasil dihapus', 'success')</script>");
    }
}
