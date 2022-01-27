<?php

namespace App\Http\Controllers;

use App\Models\Model\Keluarga;
use App\Models\Model\Penduduk;
use App\Models\Model\ProgramBantuan;
use App\Models\Model\ProgramPeserta;
use App\Models\Model\RTM;
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

        return redirect("/page/admin/program_bantuan")->with('message', "<script>swal('Selamat!', 'Data Berhasil Ditambah'success')</script>");

    }

    public function rincian_bantuan($id)
    {
        $data["detail"] = ProgramBantuan::where("id", $id)->first();
        $data["daftar_peserta"] = ProgramPeserta::where("program_id", $data["detail"]->id)->get();

        return view("/admin/page/program_bantuan/rincian_bantuan_peserta", $data);
    }

    public function tambah_peserta($id)
    {
        $data["detail"] = ProgramBantuan::where("id", $id)->first();

        if ($data["detail"]["sasaran"] == 1) {
            $data["data_penduduk"] = Penduduk::where("id_kk", NULL)->where("id_rtm", NULL)->get();
        } else if($data["detail"]["sasaran"] == 2) {
            $data["data_penduduk"] = Penduduk::where("id_kk", "!=", NULL)->where("kk_level", "1")->get();
        } else if($data["detail"]["sasaran"] == 3) {
            $data["data_penduduk"] = Penduduk::where("id_rtm", "!=", NULL)->where("rtm_level", "1")->get();
        }

        return view("/admin/page/program_bantuan/tambah_data_peserta", $data);
    }

    public function data_program_bantuan(Request $request)
    {
        $data["detail"] = ProgramBantuan::where("id", $request->id)->first();

        if ($data["detail"]["sasaran"] == 1) {
            $data["data_penduduk"] = Penduduk::where("id_kk", NULL)->where("id_rtm", NULL)->get();
        } else if($data["detail"]["sasaran"] == 2) {
            $data["data_penduduk"] = Penduduk::where("id_kk", "!=", NULL)->where("kk_level", "1")->get();
        } else if($data["detail"]["sasaran"] == 3) {
            $data["data_penduduk"] = Penduduk::where("id_rtm", "!=", NULL)->where("rtm_level", "1")->get();
        }

        $data["edit"] = Penduduk::where("id", $request->id_penduduk)->first();

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

    public function profil_peserta($id, $nik)
    {
        $data = [
            "profil" => ProgramPeserta::where("kartu_nik", $nik)->first(),
            "data_profil" => ProgramPeserta::where("kartu_nik", $nik)->get()
        ];

        return view("/admin/page/program_bantuan/profil_peserta_bantuan", $data);
    }
}
