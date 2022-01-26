<?php

namespace App\Http\Controllers;

use App\Models\Model\Cacat;
use App\Models\Model\Dusun;
use App\Models\Model\GolonganDarah;
use App\Models\Model\Keluarga;
use App\Models\Model\KeluargaSejahtera;
use App\Models\Model\Penduduk;
use App\Models\Model\PendudukAgama;
use App\Models\Model\PendudukHubungan;
use App\Models\Model\PendudukKawin;
use App\Models\Model\PendudukPekerjaan;
use App\Models\Model\PendudukPendidikan;
use App\Models\Model\PendudukPendidikanKK;
use App\Models\Model\PendudukSex;
use App\Models\Model\PendudukWargaNegara;
use App\Models\Model\Rt;
use App\Models\Model\Rw;
use App\Models\Model\SakitMenahun;
use Illuminate\Http\Request;

class KeluargaController extends Controller
{
    public function index()
    {
        $data = [
            "data_penduduk" => Penduduk::where("id_kk", NULL)->get(),
            "data_keluarga" => Keluarga::all()
        ];

        return view("/admin/page/kependudukan/keluarga/data_penduduk_keluarga", $data);
    }

    public function data()
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

        return $data;
    }

    public function form_tambah_penduduk_masuk()
    {
        $data = $this->data();

        return view("admin.page.kependudukan.keluarga.form_tambah_data_penduduk_masuk", $data);
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

        return redirect("page.admin.kependudukan.keluarga");
    }

    public function form_edit_data_penduduk_masuk(Request $request)
    {
        $data = [
            "data_keluarga_sejahtera" => KeluargaSejahtera::get(),
            "keluarga" => Keluarga::where('id', $request->id)->first(),
            "data_dusun" => Dusun::get(),
            "data_rw" => Rw::get(),
            "data_rt" => Rt::get(),
            "edit" => Keluarga::where("id", $request->id)->first()
        ];

        $data['kepala_keluarga'] = Penduduk::where('id_kk', $data['keluarga']->nik_kepala)->where('kk_level', 1)->first();

        return view("admin.page.kependudukan.keluarga.form_edit_data_penduduk_masuk", $data);
    }

    public function rincian_keluarga($id)
    {
        $data = [
            "edit" => Keluarga::where("id", $id)->first()
        ];

        if (!$data["edit"]) {
            abort(404);
        }

        return view("/admin/page/kependudukan/keluarga/rincian_keluarga", $data);
    }

    public function rincian_keluarga_hapus(Request $request)
    {
        $cek = Penduduk::where("id", $request->id_penduduk)->first();

        if ($cek->kk_level == 1) {

            Keluarga::where("nik_kepala", $cek->id)->delete();

            Penduduk::where("id", $cek->id)->update([
                "id_kk" => NULL,
                "kk_level" => NULL
            ]);

            return redirect("/page/admin/kependudukan/keluarga");
        } else {
            Penduduk::where("id", $cek->id)->update([
                "id_kk" => NULL,
                "kk_level" => NULL
            ]);

            return back();
        }

    }

    public function anggota_keluarga_lahir($id)
    {
        $data = $this->data();
        $data["edit"] = Keluarga::where("id", $id)->first();

        return view("admin.page.kependudukan.keluarga.anggota_keluarga_lahir", $data);
    }

    public function anggota_keluarga_masuk()
    {
        $data = $this->data();
        return view("admin.page.kependudukan.keluarga.anggota_keluarga_masuk", $data);
    }

    public function tambah_kepala_keluarga(Request $request)
    {
        $cek = Keluarga::where("no_kk", $request->no_kk)->count();

        if ($cek) {
            return back()->with('message', "<script>swal('Maaf!', 'Tidak Boleh Duplikasi Data', 'error')</script>");
        }

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
        $data = $this->data();
        $data["edit"] = Keluarga::where("id", $id)->first();

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
        $data = $this->data();
        $data["edit"] = Keluarga::where("id", $id)->first();

        return view("admin.page.kependudukan.keluarga.tambah_anggota_keluarga_masuk", $data);
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
            "detail" => Keluarga::where("id", $request->id)->first()
        ];

        return view("/admin/page/kependudukan/keluarga/form_tambah_data_anggota_keluarga", $data);
    }

    public function tambah_penduduk_dari_daftar(Request $request)
    {

        Penduduk::where("id", $request->id_penduduk)->update([
            "id_kk" => $request->id_kk
        ]);

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil Ditambah', 'success')</script>");
    }

    public function ubah_hubungan_keluarga(Request $request)
    {
        $data = [
            "detail" => Penduduk::where("id", $request->id)->first(),
            "data_hubungan" => PendudukHubungan::all()
        ];

        return view("/admin/page/kependudukan/keluarga/ubah_hubungan_keluarga", $data);
    }

    public function ubah_data_hubungan_keluarga(Request $request)
    {
        Penduduk::where("id", $request->id_penduduk)->update([
            "kk_level" => $request->kk_level
        ]);

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil Diubah', 'success')</script>");
    }

    public function simpan_data_keluarga(Request $request)
    {
        Keluarga::where("id", $request->id_keluarga)->update([
            "no_kk" => $request->no_kk,
            "alamat" => $request->alamat,
            "tgl_cetak_kk" => $request->tanggal_cetak,
            "kelas_sosial" => $request->kelas_sosial
        ]);

        Penduduk::where("id", $request->nik)->update([
            "id_dusun" => $request->id_dusun,
            "id_rw" => $request->id_rw,
            "id_rt" => $request->id_rt
        ]);

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil Diubah', 'success')</script>");
    }

}
