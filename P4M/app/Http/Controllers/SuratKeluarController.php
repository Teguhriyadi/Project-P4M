<?php

namespace App\Http\Controllers;

use App\Models\Model\KlasifikasiSurat;
use App\Models\Model\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $data = [
            "data_surat_keluar" => SuratKeluar::get()
        ];

        return view('admin.page.surat.keluar.index', $data);
    }

    public function create()
    {
        $data = [
            "data_klasifikasi" => KlasifikasiSurat::get()
        ];

        return view("/admin/page/surat/keluar/form_tambah", $data);
    }

    public function store(Request $request)
    {
        $simpan = new SuratKeluar;
        $simpan->nomor_urut = $request->nomor_urut;
        $simpan->nomor_surat = $request->nomor_surat;
        $simpan->kode_surat = $request->kode_surat;
        $simpan->tanggal_surat = $request->tanggal_surat;
        $simpan->tujuan = $request->tujuan;
        $simpan->isi_singkat = $request->isi_singkat;

        if($request->file("berkas_scan")) {
            $simpan->berkas_scan = $request->file('berkas_scan')->store('berkas_scan_keluar');
        }

        $simpan->save();

        return redirect("/page/admin/surat/keluar");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Request $request, $id)
    {
        if ($request->oldBerkasScan) {
            Storage::delete($request->oldBerkasScan);
        }

        SuratKeluar::where("id", $id)->delete();

        return back();

    }
}
