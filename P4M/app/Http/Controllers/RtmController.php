<?php

namespace App\Http\Controllers;

use App\Models\Model\Keluarga;
use App\Models\Model\Penduduk;
use App\Models\Model\ProgramBantuan;
use App\Models\Model\RTM;
use App\Models\Model\RtmHubungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class RtmController extends Controller
{
    public function index()
    {
        $data = [
            "data_penduduk" => Penduduk::where("id_rtm", NULL)->get(),
            "data_rtm" => RTM::all()
        ];

        return view("admin.page.kependudukan.rtm.data_rtm", $data);
    }

    public function store(Request $request)
    {
        $data = [
            "max" => $this->maxNumber()
        ];

        Penduduk::where("id", $request->nik_kepala)->update([
            "id_rtm" => $data['max'],
            "rtm_level" => 1
        ]);

        RTM::create([
            "nik_kepala" => $request->nik_kepala,
            "no_kk" => $data['max'],
            "kelas_sosial" => 1
        ]);

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil Ditambah', 'success')</script>");

    }

    public function rincian_rtm($id)
    {
        $data = [
            "edit" => RTM::where("id", $id)->first()
        ];

        $data["program_bantuan"] = ProgramBantuan::get();

        if (!$data["edit"]) {
            abort(404);
        }

        return view("/admin/page/kependudukan/rtm/rincian_rtm", $data);
    }

    public function tambah_data_anggota_rtm(Request $request)
    {
        $data = [
            "edit" => RTM::where("id", $request->id)->first()
        ];

        return view("/admin/page/kependudukan/rtm/tambah_data_anggota_rtm", $data);
    }

    public function tambah_data_anggota(Request $request)
    {
        Penduduk::where("id", $request->id_penduduk)->update([
            "id_rtm" => $request->no_kk,
            "rtm_level" => 2
        ]);

        return redirect("/page/admin/kependudukan/rtm")->with('message', "<script>swal('Selamat!', 'Data Berhasil Ditambah'success')</script>");

    }

    public function tambah_anggota_rumah_tangga(Request $request)
    {
        $data = [
            "detail" => RTM::where("id", $request->id)->first()
        ];

        return view("/admin/page/kependudukan/rtm/tambah_anggota_rumah_tangga", $data);
    }

    public function simpan_data_anggota_rumah_tangga(Request $request)
    {
        Penduduk::where("id", $request->nik)->update([
            "id_rtm" => $request->no_kk,
            "rtm_level" => 2
        ]);

        return back();
    }

    public function kartu_rtm($id)
    {
        $data = [
            "detail" => RTM::where("id", $id)->first()
        ];

        return view("/admin/page/kependudukan/rtm/kartu_rtm", $data);
    }

    public function cetak_rtm($id)
    {
        $data = [
            "detail" => RTM::where("id", $id)->first()
        ];
        return view("/admin/page/kependudukan/rtm/cetak_rtm", $data);
    }

    public function maxNumber()
    {
        $max = RTM::max('no_kk');
        $urutan = (int) substr($max, 2);
        $urutan++;
        $hasil = sprintf("%03s", $urutan);
        return $hasil;
    }

    public function hapus_data_rtm($id)
    {
        $ambil = RTM::where("id", $id)->first();

        Penduduk::where("id_rtm", $ambil->no_kk)->update([
            "id_rtm" => NULL,
            "rtm_level" => 0
        ]);

        $ambil->delete();

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil Dihapus', 'success')</script>");
    }

    public function ubah_hubungan_rumah_tangga(Request $request)
    {
        $data = [
            "data_rtm_hubungan" => RtmHubungan::get(),
            "edit" => Penduduk::where("id", $request->id)->first()
        ];

        return view("/admin/page/kependudukan/rtm/ubah_hubungan", $data);
    }

    public function ubah_hubungan(Request $request)
    {
        $data = Penduduk::where("id", $request->id_penduduk)->first();

        Penduduk::where("id_rtm", $data->id_rtm)->where("rtm_level", 1)->update([
            "rtm_level" => 2
        ]);

        Penduduk::where("id", $data->id)->update([
            "rtm_level" => 1
        ]);

        RTM::where("no_kk", $data->id_rtm)->update([
            "nik_kepala" => $data->id
        ]);

        return back();

    }

}
