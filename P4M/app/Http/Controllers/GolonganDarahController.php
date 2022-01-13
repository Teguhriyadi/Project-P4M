<?php

namespace App\Http\Controllers;

use App\Models\Model\GolonganDarah;
use Illuminate\Http\Request;

class GolonganDarahController extends Controller
{
    public function index()
    {
        $data = [
            "data_golongan_darah" => GolonganDarah::orderBy("nama", "DESC")->get()
        ];

        return view("/admin/page/penduduk/golongan_darah/data_golongan_darah", $data);
    }

    public function store(Request $request)
    {
        GolonganDarah::create($request->all());

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Tambahkan', 'success')</script>");
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => GolonganDarah::where("id", $request->id)->first()
        ];

        return view("/admin/page/penduduk/golongan_darah/edit_data_golongan_darah", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Model\GolonganDarah  $golonganDarah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        GolonganDarah::where("id", $request->id)->update([
            "nama" => $request->nama
        ]);

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Ubah', 'success')</script>");
    }

    public function destroy($id)
    {
        GolonganDarah::where("id", $id)->delete();

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Hapus', 'success')</script>");
    }
}
