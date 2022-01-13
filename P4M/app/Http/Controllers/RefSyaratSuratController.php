<?php

namespace App\Http\Controllers;

use App\Models\Model\RefSyaratSurat;
use Illuminate\Http\Request;

class RefSyaratSuratController extends Controller
{
    public function index()
    {
        $data = [
            "data_ref_syarat" => RefSyaratSurat::orderBy("ref_syarat_nama")->get()
        ];

        return view("/admin/page/surat/ref_syarat/data_ref_syarat", $data);
    }

    public function store(Request $request)
    {
        RefSyaratSurat::create($request->all());

        return back()->with('message', "<script>swal('Selamat!', 'Profil desa berhasil ditambahkan', 'success')</script>");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Model\RefSyaratSurat  $refSyaratSurat
     * @return \Illuminate\Http\Response
     */
    public function show(RefSyaratSurat $refSyaratSurat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Model\RefSyaratSurat  $refSyaratSurat
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data = [
            "edit" => RefSyaratSurat::where("id", $request->id)->first()
        ];

        return view("/admin/page/surat/ref_syarat/edit_data_ref_syarat_surat", $data);
    }

    public function update(Request $request)
    {
        RefSyaratSurat::where("id", $request->id)->update([
            "ref_syarat_nama" => $request->ref_syarat_nama
        ]);

        return back()->with('message', "<script>swal('Selamat!', 'Profil desa berhasil diubah', 'success')</script>");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model\RefSyaratSurat  $refSyaratSurat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RefSyaratSurat::where("id", $id)->delete();

        return back()->with('message', "<script>swal('Selamat!', 'Profil desa berhasil dihapus', 'success')</script>");
    }
}
