<?php

namespace App\Http\Controllers;

use App\Models\Model\KlasifikasiSurat;
use Illuminate\Http\Request;

class KlasifikasiSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "data_klasifikasi_surat" => KlasifikasiSurat::orderBy("kode", "asc")->get()
        ];

        return view("/admin/page/surat/klasifikasi/data_klasifikasi_surat", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        KlasifikasiSurat::create($request->all());

        return back()->with('message', "<script>swal('Selamat!', 'Data anda berhasil ditambahkan', 'success')</script>");
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => KlasifikasiSurat::where("id", $request->id)->first()
        ];

        return view("/admin/page/surat/klasifikasi/edit_data_klasifikasi_surat", $data);
    }

    public function update(Request $request, KlasifikasiSurat $klasifikasiSurat)
    {
        KlasifikasiSurat::where("id", $request->id)->update([
            "kode" => $request->kode,
            "nama" => $request->nama
        ]);

        return back()->with('message', "<script>swal('Selamat!', 'Data anda berhasil diubah', 'success')</script>");
    }

    public function destroy($id)
    {
        KlasifikasiSurat::where("id", $id)->delete();

        return back()->with('message', "<script>swal('Selamat!', 'Data anda berhasil dihapus', 'success')</script>");
    }
}
