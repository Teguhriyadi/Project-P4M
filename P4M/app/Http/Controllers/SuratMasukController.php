<?php

namespace App\Http\Controllers;

use App\Models\Model\DisposisiSuratMasuk;
use App\Models\Model\KlasifikasiSurat;
use App\Models\Model\StrukturPemerintahan;
use App\Models\Model\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{
    public function index()
    {
        $data = [
            "data_klasifikasi" => KlasifikasiSurat::get(),
            "data_surat_masuk" => SuratMasuk::get()
        ];

        return view('admin.page.surat.masuk.index', $data);
    }

    public function create()
    {
        $data = [
            "data_klasifikasi" => KlasifikasiSurat::get(),
            "data_struktur" => StrukturPemerintahan::get()
        ];

        return view("/admin/page/surat/masuk/form_tambah", $data);
    }

    public function store(Request $request)
    {
        $simpan = new SuratMasuk;
        $simpan->nomor_urut = $request->nomor_urut;
        $simpan->tanggal_penerimaan = $request->tanggal_penerimaan;
        $simpan->nomor_surat = $request->nomor_surat;
        $simpan->kode_surat = $request->kode_surat;
        $simpan->tanggal_surat = $request->tanggal_surat;
        $simpan->pengirim = $request->pengirim;
        $simpan->isi_singkat = $request->isi_singkat;
        $simpan->isi_disposisi = $request->isi_disposisi;

        if($request->file("berkas_scan")) {
            $simpan->berkas_scan = $request->file('berkas_scan')->store('berkas');
        }

        $simpan->save();

        $id_pegawai = $request->id_pegawai;
        foreach ($request->id_pegawai as $d => $unit) {
            $s = new DisposisiSuratMasuk;
            $s->id_surat_masuk = $simpan->id;
            $s->id_pegawai = $id_pegawai[$d];
            $s->disposisi_ke = "1";

            $s->save();
        }

        return redirect("/page/admin/surat/masuk")->with('message', "<script>swal('Selamat!', 'Data Berhasil Ditambah'success')</script>");
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

    public function edit($id)
    {
        $data = [
            "data_klasifikasi" => KlasifikasiSurat::get(),
            "data_struktur" => StrukturPemerintahan::get(),
            "edit" => SuratMasuk::where("id", $id)->first()
        ];

        return view("/admin/page/surat/masuk/form_edit", $data);
    }

    public function update(Request $request, $id)
    {
        $simpan = SuratMasuk::where("id", $id)->first();
        $simpan->nomor_urut = $request->nomor_urut;
        $simpan->tanggal_penerimaan = $request->tanggal_penerimaan;
        $simpan->nomor_surat = $request->nomor_surat;
        $simpan->kode_surat = $request->kode_surat;
        $simpan->tanggal_surat = $request->tanggal_surat;
        $simpan->pengirim = $request->pengirim;
        $simpan->isi_singkat = $request->isi_singkat;
        $simpan->isi_disposisi = $request->isi_disposisi;

        if($request->file("berkas_scan")) {

            if ($request->oldBerkasScan) {
                Storage::delete($request->oldBerkasScan);
            }

            $simpan->berkas_scan = $request->file('berkas_scan')->store('berkas');
        }

        $simpan->save();

        $id_pegawai = $request->id_pegawai;
        foreach ($request->id_pegawai as $d => $unit) {
            $s = DisposisiSuratMasuk::where("id_surat_masuk", $id)->first();
            $s->id_pegawai = $id_pegawai[$d];
            $s->disposisi_ke = "1";

            $s->update();
        }

        return redirect("/page/admin/surat/masuk")->with('message', "<script>swal('Selamat!', 'Data Berhasil Diubah', 'success')</script>");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->oldBerkasScan) {
            Storage::delete($request->oldBerkasScan);
        }

        SuratMasuk::where("id", $id)->delete();

        return back();
    }
}
