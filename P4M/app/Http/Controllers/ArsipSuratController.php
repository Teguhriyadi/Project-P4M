<?php

namespace App\Http\Controllers;

use App\Models\Model\LogSurat;
use App\Models\Model\Penduduk;
use Illuminate\Http\Request;

class ArsipSuratController extends Controller
{
    public function index()
    {
        $data = [
            "data_arsip" => LogSurat::all()
        ];

        return view("admin.page.surat.arsip.index", $data);
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => LogSurat::where("id", $request->id)->first()
        ];

        return view("/admin/page/surat/arsip/edit_data", $data);
    }

    public function update(Request $request)
    {
        LogSurat::where("id", $request->id)->update([
            "keterangan" => $request->keterangan
        ]);

        return back()->with('message', "<script>swal('Selamat!', 'Alamat Berhasil Diubah', 'success')</script>");
    }

    public function destroy($id)
    {
        LogSurat::where("id", $id)->delete();

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil Dihapus'success')</script>");
    }

    public function perorangan()
    {
        $data = [
            "data_penduduk" => Penduduk::all(),
            "data_log" => LogSurat::all()
        ];

        return view("/admin/page/surat/arsip/rekam_perorangan", $data);
    }

    public function detail(Request $request)
    {
        $data = [
            "data_penduduk" => Penduduk::all(),
            "data_log" => LogSurat::all(),
            "detail" => LogSurat::where("id_penduduk", $request->id_penduduk)->first(),
            "id" => $request->id_penduduk
        ];

        return view("/admin/page/surat/arsip/rekam_perorangan", $data);
    }

}
