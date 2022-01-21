<?php

namespace App\Http\Controllers;

use App\Models\Model\Cacat;
use App\Models\Model\Dusun;
use App\Models\Model\GolonganDarah;
use App\Models\Model\Keluarga;
use App\Models\Model\KeluargaSejahtera;
use App\Models\model\Penduduk;
use App\Models\Model\PendudukAgama;
use App\Models\Model\PendudukHubungan;
use App\Models\Model\PendudukKawin;
use App\Models\Model\PendudukPekerjaan;
use App\Models\Model\PendudukPendidikan;
use App\Models\Model\PendudukPendidikanKK;
use App\Models\Model\PendudukSex;
use App\Models\Model\PendudukWargaNegara;
use App\Models\model\Rt;
use App\Models\model\Rw;
use App\Models\Model\SakitMenahun;
use Illuminate\Http\Request;

class KeluargaController extends Controller
{
    public function index()
    {
        $data = [
            "data_keluarga" => Keluarga::all()
        ];

        return view("/admin/page/kependudukan/keluarga/data_penduduk_keluarga", $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Keluarga $keluarga)
    {
        //
    }

    public function edit(Keluarga $keluarga)
    {
        //
    }

    public function update(Request $request, Keluarga $keluarga)
    {
        //
    }

    public function destroy(Keluarga $keluarga)
    {
        //
    }

    public function form_tambah_penduduk_masuk()
    {
        $data = [
            "data_hubungan" => PendudukHubungan::all(),
            "data_kelamin" => PendudukSex::all(),
            "data_agama" => PendudukAgama::all(),
            "data_pendidikan" => PendudukPendidikan::all(),
            "data_pendidikan_kk" => PendudukPendidikanKK::all(),
            "data_pekerjaan" => PendudukPekerjaan::all(),
            "data_warganegara" => PendudukWargaNegara::all(),
            "data_kawin" => PendudukKawin::all(),
            "data_darah" => GolonganDarah::all(),
            "data_dusun" => Dusun::all(),
            "data_rt" => Rt::all(),
            "data_rw" => Rw::all(),
            "data_cacat" => Cacat::all(),
            "data_sakit_menahun" => SakitMenahun::all()
        ];

        return view("/admin/page/kependudukan/keluarga/form_tambah_data_penduduk_masuk", $data);
    }

    public function tambah_data_penduduk_masuk(Request $request)
    {
        Penduduk::create($request->all());
        Keluarga::create([
            "no_kk" => $request->no_kk,
            "nik_kepala" => $request->nik,
            "tgl_daftar" => date("Y-m-d"),
            "tgl_cetak_kk" => date("Y-m-d"),
            "alamat" => "indonesia",
            "id_cluster" => 1,
            "updated_by" => auth()->user()->id,
            "updated_at" => date("Y-m-d H:i:s")
        ]);

        return redirect("/page/admin/kependudukan/keluarga");
    }

    public function form_edit_data_penduduk_masuk(Request $request)
    {
        $data = [
            "data_keluarga_sejahtera" => KeluargaSejahtera::get()
        ];

        return view("/admin/page/kependudukan/keluarga/form_edit_data_penduduk_masuk", $data);
    }

    public function rincian_keluarga($id)
    {
        $data = [
            "edit" => Keluarga::where("id", $id)->first()
        ];

        return view("/admin/page/kependudukan/keluarga/rincian_keluarga", $data);
    }

    public function anggota_keluarga_lahir($id)
    {
        $data = [
            "data_hubungan" => PendudukHubungan::all(),
            "data_kelamin" => PendudukSex::all(),
            "data_agama" => PendudukAgama::all(),
            "data_pendidikan" => PendudukPendidikan::all(),
            "data_pendidikan_kk" => PendudukPendidikanKK::all(),
            "data_pekerjaan" => PendudukPekerjaan::all(),
            "data_warganegara" => PendudukWargaNegara::all(),
            "data_kawin" => PendudukKawin::all(),
            "data_darah" => GolonganDarah::all(),
            "data_dusun" => Dusun::all(),
            "data_rt" => Rt::all(),
            "data_rw" => Rw::all(),
            "data_cacat" => Cacat::all(),
            "data_sakit_menahun" => SakitMenahun::all(),
            "edit" => Keluarga::where("id", $id)->first()
        ];

        return view("/admin/page/kependudukan/keluarga/anggota_keluarga_lahir", $data);
    }

    public function anggota_keluarga_masuk()
    {
        return view("/admin/page/kependudukan/keluarga/anggota_keluarga_masuk");
    }

    public function tambah_kepala_keluarga(Request $request)
    {
        $ambil = Penduduk::where("id", $request->nik_kepala)->first();

        Penduduk::where("id", $request->nik_kepala)->update([
            "kk_level" => 1,
            "id_kk" => $ambil->id
        ]);

        Keluarga::create([
            "no_kk" => $request->no_kk,
            "nik_kepala" => $request->nik_kepala,
            "tgl_daftar" => date("Y-m-d"),
            "tgl_cetak_kk" => date("Y-m-d"),
            "alamat" => "NULL",
            "id_cluster" => 1,
            "updated_at" => date("Y-m-d"),
            "updated_by" => auth()->user()->id
        ]);

        return redirect("/page/admin/kependudukan/keluarga");
    }

    public function tambah_anggota_keluarga_lahir($id)
    {
        $data = [
            "data_hubungan" => PendudukHubungan::all(),
            "data_kelamin" => PendudukSex::all(),
            "data_agama" => PendudukAgama::all(),
            "data_pendidikan" => PendudukPendidikan::all(),
            "data_pendidikan_kk" => PendudukPendidikanKK::all(),
            "data_pekerjaan" => PendudukPekerjaan::all(),
            "data_warganegara" => PendudukWargaNegara::all(),
            "data_kawin" => PendudukKawin::all(),
            "data_darah" => GolonganDarah::all(),
            "data_dusun" => Dusun::all(),
            "data_rt" => Rt::all(),
            "data_rw" => Rw::all(),
            "data_cacat" => Cacat::all(),
            "data_sakit_menahun" => SakitMenahun::all(),
            "edit" => Keluarga::where("id", $id)->first()
        ];

        return view("/admin/page/kependudukan/keluarga/tambah_anggota_keluarga_lahir", $data);
    }

    public function tambah_data_anggota_keluarga_lahir(Request $request)
    {
        Penduduk::create([
            "nik" => $request->nik,
            "nama" => $request->nama,
            "id_kk" => $request->id
        ]);

        return redirect("/page/admin/kependudukan/keluarga/".$request->id."/rincian_keluarga");
    }

    public function tambah_anggota_keluarga_masuk($id)
    {
        $data = [
            "data_hubungan" => PendudukHubungan::all(),
            "data_kelamin" => PendudukSex::all(),
            "data_agama" => PendudukAgama::all(),
            "data_pendidikan" => PendudukPendidikan::all(),
            "data_pendidikan_kk" => PendudukPendidikanKK::all(),
            "data_pekerjaan" => PendudukPekerjaan::all(),
            "data_warganegara" => PendudukWargaNegara::all(),
            "data_kawin" => PendudukKawin::all(),
            "data_darah" => GolonganDarah::all(),
            "data_dusun" => Dusun::all(),
            "data_rt" => Rt::all(),
            "data_rw" => Rw::all(),
            "data_cacat" => Cacat::all(),
            "data_sakit_menahun" => SakitMenahun::all(),
            "edit" => Keluarga::where("id", $id)->first()
        ];

        return view("/admin/page/kependudukan/keluarga/tambah_anggota_keluarga_masuk", $data);
    }

    public function tambah_data_anggota_keluarga_masuk(Request $request)
    {
        Penduduk::create([
            "nik" => $request->nik,
            "nama" => $request->nama,
            "id_kk" => $request->id
        ]);

        return redirect("/page/admin/kependudukan/keluarga/".$request->id."/rincian_keluarga");
    }

    public function form_tambah_data_anggota_keluarga(Request $request)
    {
        $data = [
            "detail" => Penduduk::where("id", $request->id)->first()
        ];

        return view("/admin/page/kependudukan/keluarga/form_tambah_data_anggota_keluarga", $data);
    }

    public function tambah_penduduk_dari_daftar(Request $request)
    {
        Penduduk::where("id", $request->id_penduduk)->update([
            "id_kk" => $request->id_kk
        ]);

        return redirect("/page/admin/kependudukan/keluarga/".$request->id_penduduk."/rincian_keluarga");
    }

}
