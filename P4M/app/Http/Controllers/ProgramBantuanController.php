<?php

namespace App\Http\Controllers;

use App\Models\Model\Keluarga;
use App\Models\Model\ProgramBantuan;
use App\Models\Model\ProgramPeserta;
use App\Models\model\Rt;
use Illuminate\Http\Request;

class ProgramBantuanController extends Controller
{
    public function index()
    {
        $data = [
            "data_program_bantuan" => ProgramBantuan::all()
        ];

        return view("/admin/page/program_bantuan/data_program_bantuan", $data);
    }

    public function create()
    {
        return view("/admin/page/program_bantuan/form_tambah_program_bantuan");
    }

    public function store(Request $request)
    {
        ProgramBantuan::create([
            "nama" => $request->nama,
            "sasaran" => $request->sasaran,
            "deskripsi" => $request->deskripsi,
            "tanggal_mulai" => $request->tanggal_mulai,
            "tanggal_berakhir" => $request->tanggal_berakhir,
            "user_id" => auth()->user()->id,
            "status" => $request->status,
            "asal_dana" => $request->asal_dana
        ]);

        return redirect("/page/admin/program_bantuan");
    }

    public function rincian_bantuan($id)
    {
        $data["detail"] = ProgramBantuan::where("id", $id)->first();
        $data["daftar_peserta"] = ProgramPeserta::where("program_id", $data["detail"]->id)->get();

        return view("/admin/page/program_bantuan/rincian_bantuan", $data);
    }

    public function tambah_peserta($id)
    {
        $data = [
            "detail" => ProgramBantuan::where("id", $id)->first(),
            "data_keluarga" => Keluarga::all()
        ];

        return view("/admin/page/program_bantuan/tambah_data_peserta", $data);
    }

    public function data_program_bantuan(Request $request)
    {
        $data = [
            "detail" => ProgramBantuan::where("id", $request->id)->first(),
            "data_keluarga" => Keluarga::all(),
            "detail_keluarga" => Keluarga::where("nik_kepala", $request->nik)->first()
        ];

        return view("/admin/page/program_bantuan/tambah_data_peserta", $data);
    }

    public function tambah_data_peserta_bantuan(Request $request)
    {
        ProgramPeserta::create($request->all());

        return redirect("/page/admin/program_bantuan/".$request->program_id."/rincian");
    }

    public function edit_data_peserta(Request $request)
    {
        $data = [
            "edit" => ProgramPeserta::where("id", $request->id)->first()
        ];

        return view("/admin/page/program_bantuan/form_edit_data_peserta", $data);
    }

    public function simpan_data_peserta(Request $request)
    {
        ProgramPeserta::where("id", $request->id)->update([
            "no_id_kartu" => $request->no_id_kartu,
            "kartu_nik" => $request->kartu_nik,
            "kartu_nama" => $request->kartu_nama,
            "kartu_tempat_lahir" => $request->kartu_tempat_lahir,
            "kartu_alamat" => $request->kartu_alamat
        ]);

        return back();
    }

    public function hapus_data_peserta(Request $request)
    {
        ProgramPeserta::where("id", $request->id)->delete();

        return back();
    }
}
