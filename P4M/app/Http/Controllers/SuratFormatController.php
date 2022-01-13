<?php

namespace App\Http\Controllers;

use App\Models\Model\SuratFormat;
use App\Models\Model\KlasifikasiSurat;
use App\Models\Model\RefSyaratSurat;
use App\Models\Model\SyaratSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;

class SuratFormatController extends Controller
{
    public function index()
    {
        $data = [
            "data_surat_format" => SuratFormat::orderBy("nama", "DESC")->get(),
            "data_klasifikasi" => KlasifikasiSurat::orderBy("kode", "DESC")->get()
        ];

        return view("/admin/page/surat/format/data_surat_format", $data);
    }

    public function create()
    {
        $data = [
            "data_klasifikasi" => KlasifikasiSurat::orderBy("kode", "DESC")->get(),
            "data_syarat" => RefSyaratSurat::get()
        ];

        return view("/admin/page/surat/format/form_tambah_data_surat_format", $data);
    }

    public function store(Request $request)
    {
        $surat_format = new SuratFormat;
        $surat_format->nama = $request->nama;
        $surat_format->url_surat = Str::slug($request->nama);
        $surat_format->kode_surat = $request->kode_surat;
        $surat_format->mandiri = $request->mandiri;
        $surat_format->masa_berlaku = $request->masa_berlaku;
        $surat_format->satuan_masa_berlaku = $request->satuan_masa_berlaku;
        $surat_format->save();

        $syarat = $request->syarat;
        foreach ($request->syarat as $d => $unit) {
            $c = new SyaratSurat;
            $c->surat_format_id = $surat_format->id;
            $c->ref_syarat_id = $syarat[$d];

            $c->save();
        }

        return redirect("/page/admin/surat/format")->with('message', "<script>swal('Selamat!', 'Data anda berhasil ditambahkan', 'success')</script>");
    }

    public function edit($id)
    {
        $data = [
            "edit" => SuratFormat::where("id", $id)->first(),
            "data_klasifikasi" => KlasifikasiSurat::orderBy("kode", "DESC")->get(),
            "data_syarat" => RefSyaratSurat::get()
        ];

        return view("/admin/page/surat/format/form_edit_data_surat_format", $data);
    }

    public function update(Request $request, $id)
    {
        $surat_format = SuratFormat::find($id);
        $surat_format->nama = $request->nama;
        $surat_format->url_surat = Str::slug($request->nama);
        $surat_format->kode_surat = $request->kode_surat;
        $surat_format->mandiri = $request->mandiri;
        $surat_format->masa_berlaku = $request->masa_berlaku;
        $surat_format->satuan_masa_berlaku = $request->satuan_masa_berlaku;
        $surat_format->update();

        $syarat = $request->syarat;
        foreach ($request->syarat as $d => $unit) {
            $c = SyaratSurat::find($surat_format->id);
            $c->surat_format_id = $surat_format->id;
            $c->ref_syarat_id = $syarat[$d];

            $c->update();
        }

        return redirect("/page/admin/surat/format")->with('message', "<script>swal('Selamat!', 'Data anda berhasil diubah', 'success')</script>");
    }

    public function destroy($id)
    {
        SuratFormat::where("id", $id)->delete();

        return redirect("/page/admin/surat/format")->with('message', "<script>swal('Selamat!', 'Data anda berhasil dihapus', 'success')</script>");
    }
}
