<?php

namespace App\Http\Controllers;

use App\Models\Model\Cacat;
use App\Models\Model\Rt;
use App\Models\Model\Rw;
use App\Models\Model\Dusun;
use App\Models\Model\Penduduk;
use App\Models\Model\PendudukSex;
use App\Models\Model\PendudukAgama;
use App\Models\Model\PendudukHubungan;
use App\Models\Model\PendudukKawin;
use App\Models\Model\GolonganDarah;
use App\Models\Model\Jabatan;
use App\Models\Model\LogPenduduk;
use App\Models\Model\PendudukPendidikan;
use App\Models\Model\PendudukPekerjaan;
use App\Models\Model\PendudukPendidikanKK;
use App\Models\Model\PendudukWargaNegara;
use App\Models\Model\StatusDasar;
use App\Models\Model\RefPindah;
use App\Models\Model\SakitMenahun;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function index()
    {
        $data = [
            "data_status_dasar" => StatusDasar::get(),
            "penduduk" => Penduduk::where('id_status_dasar', 1)->latest()->get()
        ];

        return view("admin/page/penduduk/home", $data);
    }

    public function create()
    {
        $data = [
            "data_hubungan" => PendudukHubungan::all(),
            "data_kelamin" => PendudukSex::all(),
            "data_agama" => PendudukAgama::all(),
            "data_pendidikan" => PendudukPendidikan::all(),
            "data_pekerjaan" => PendudukPekerjaan::all(),
            "data_warganegara" => PendudukWargaNegara::all(),
            "data_kawin" => PendudukKawin::all(),
            "data_darah" => GolonganDarah::all(),
            "data_dusun" => Dusun::all(),
            "data_rt" => Rt::all(),
            "data_rw" => Rw::all(),
        ];

        return view("admin/page/penduduk/create", $data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "nik" => "required|max:20",
            "nama" => "required",
            "kk_sebelumnya" => "required|max:20",
            "id_hubungan" => "required",
            "id_sex" => "required",
            "id_agama" => "required",
            "tempat_lahir" => "required",
            "tgl_lahir" => "required",
            "waktu_lahir" => "required",
            "kelahiran_ke" => "required",
            "jumlah_saudara" => "required",
            "berat_lahir" => "required",
            "panjang_lahir" => "required",
            "id_pendidikan" => "required",
            "id_pekerjaan" => "required",
            "id_warga_negara" => "required",
            "nik_ayah" => "required|max:20",
            "nik_ibu" => "required|max:20",
            "nama_ayah" => "required",
            "nama_ibu" => "required",
            "status_kawin" => "required",
            "id_rt" => "required",
            "id_rw" => "required",
            "id_dusun" => "required",
        ]);

        $validatedData["status_hidup"] = 1;
        $validatedData["id_golongan_darah"] = $request->id_golongan_darah;
        $validatedData["telepon"] = $request->telepon;

        Penduduk::create($validatedData);

        return redirect('/page/admin/kependudukan/penduduk')->with('message', "<script>swal('Selamat!', 'Data anda berhasil ditambahkan', 'success')</script>");
    }

    public function show($id)
    {
        $penduduk = Penduduk::where('id', $id)->first();

        return view('admin/page/penduduk/show', compact('penduduk'));
    }

    public function edit(Penduduk $penduduk)
    {
        $data = [
            "data_penduduk" => $penduduk,
            "data_hubungan" => PendudukHubungan::all(),
            "data_kelamin" => PendudukSex::all(),
            "data_agama" => PendudukAgama::all(),
            "data_pendidikan_kk" => PendudukPendidikanKK::all(),
            "data_pendidikan" => PendudukPendidikan::all(),
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

        return view('admin/page/penduduk/edit', $data);
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $validatedData = $request->validate([
            "nik" => "required|max:20",
            "nama" => "required",
            "kk_sebelumnya" => "max:20",
            "id_hubungan" => "required",
            "id_sex" => "required",
            "id_agama" => "required",
            "tempat_lahir" => "required",
            "tgl_lahir" => "required",
            "waktu_lahir" => "required",
            "kelahiran_ke" => "required",
            "jumlah_saudara" => "required",
            "berat_lahir" => "required",
            "panjang_lahir" => "required",
            "id_pendidikan" => "required",
            "id_pekerjaan" => "required",
            "id_warga_negara" => "required",
            "nik_ayah" => "required|max:20",
            "nik_ibu" => "required|max:20",
            "nama_ayah" => "required",
            "nama_ibu" => "required",
            "status_kawin" => "required",
        ]);

        $validatedData["status_hidup"] = 1;
        $validatedData["id_golongan_darah"] = $request->id_golongan_darah;
        $validatedData["telepon"] = $request->telepon;

        Penduduk::where('id', $id)->update($validatedData);

        // return redirect('/page/admin/kependudukan/penduduk')->with('message', "<script>swal('Selamat!', 'Data anda berhasil diubah', 'success')</script>");
    }

    public function destroy($id)
    {
        $penduduk = Penduduk::where('id', $id)->first();

        if ($penduduk) {
            Penduduk::where('id', $penduduk->id)->delete();

            return redirect()->back()->with('message', "<script>swal('Selamat!', 'Data anda berhasil dihapus', 'success')</script>");
        }
    }

    public function cetak($id)
    {
        $penduduk = Penduduk::where('id', $id)->first();

        $data = Jabatan::where("nama_jabatan", "Kuwu")->first();

        return view('admin/page/penduduk/cetak', compact('penduduk', 'data'));
    }

    public function edit_status_dasar(Request $request)
    {
        $data = [
            "data_status_dasar" => StatusDasar::get(),
            "data_ref_pindah" => RefPindah::get(),
            "edit" => Penduduk::select("id")->where("id", $request->id)->first()
        ];

        return view("admin.page.penduduk.ubah_status_dasar", $data);
    }

    public function simpan_status_dasar(Request $request)
    {
        $log_penduduk = new LogPenduduk;
        $log_penduduk->id_penduduk = $request->id_penduduk;
        $log_penduduk->kode_peristiwa = 5;
        $log_penduduk->tgl_lapor = $request->tgl_lapor;
        $log_penduduk->tgl_peristiwa = $request->tgl_peristiwa;

        if ($request->status_dasar == 2) {
            // Apabila Status nya mati
            $log_penduduk->meninggal_di = $request->meninggal_di;

        } else if ($request->status_dasar == 3) {
            // Apabila Status nya pindah
            $log_penduduk->ref_pindah = $request->ref_pindah;
            $log_penduduk->tujuan_pindah = $request->tujuan_pindah;
            $log_penduduk->alamat_tujuan = $request->alamat_tujuan;

        } else if ($request->status_dasar == 4) {
            // Apabila Status nya Hilang
        }

        $log_penduduk->catatan = $request->catatan;
        $log_penduduk->created_by = auth()->user()->id;
        $log_penduduk->updated_by = auth()->user()->id;

        $log_penduduk->save();

        Penduduk::where('id', $request->id_penduduk)->update(['id_status_dasar'=> $request->status_dasar]);

        return back();
    }

    public function tambah_penduduk_lahir()
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

        return view("/admin/page/penduduk/tambah_penduduk_lahir", $data);
    }

    public function tambah_penduduk_masuk()
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

        return view("/admin/page/penduduk/tambah_penduduk_masuk", $data);
    }

    public function simpan_data_penduduk_masuk(Request $request)
    {
        Penduduk::create($request->all());

        return redirect("/page/admin/kependudukan/penduduk")->with('message', "<script>swal('Selamat!', 'Data anda berhasil ditambah', 'success')</script>");
    }

    public function paging($page)
    {
        return view('admin.page.penduduk.status_dasar.'.$page);
    }

    public function edit_data_penduduk(Request $request, $id)
    {
        Penduduk::where("id", $id)->update([
            "nik" => $request->nik,
            "nama" => $request->nama
        ]);

        return redirect("/page/admin/kependudukan/penduduk")->with('message', "<script>swal('Selamat!', 'Data Berhasil Diubah', 'success')</script>");
    }
}
