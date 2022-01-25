<?php

namespace App\Http\Controllers;

use App\Models\Model\Pegawai;
use App\Models\Model\Penduduk;
use App\Models\Model\PendudukAgama;
use App\Models\Model\PendudukPendidikanKK;
use App\Models\Model\PendudukSex;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    public function index()
    {
        $data = [
            "data_pegawai" => Pegawai::orderBy("nama", "DESC")->get()
        ];

        foreach ($data['data_pegawai'] as $pegawai) {
            if (!empty($pegawai->id_penduduk)) {
                $data['penduduk'] = Penduduk::where('id', $pegawai->id_penduduk)->first();
            }
        }

        return view("admin/page/pemerintahan/pegawai/index", $data);
    }

    public function create()
    {
        $data = [
            "data_pendidikan_kk" => PendudukPendidikanKK::orderBy("nama", "DESC")->get(),
            "data_agama" => PendudukAgama::orderBy("nama", "DESC")->get(),
            "data_sex" => PendudukSex::all(),
            "data_penduduk" => Penduduk::all()
        ];

        return view("admin.page.pemerintahan.pegawai.form_tambah_data_pegawai", $data);
    }

    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'nip' => 'required',
            'pangkat' => 'required',
            'no_sk' => 'required',
            'tgl_sk' => 'required',
            'no_henti' => 'required',
            'tgl_henti' => 'required',
            'masa_jabatan' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);
        if ($request->id_penduduk) {
            $validatedData['id_penduduk'] = $request->id_penduduk;
        } else {
            $validatedData['nama'] = $request->nama;
            $validatedData['nik'] = $request->nik;
            $validatedData['tempat_lahir'] = $request->tempat_lahir;
            $validatedData['tgl_lahir'] = $request->tgl_lahir;
            $validatedData['sex'] = $request->sex;
            $validatedData['pendidikan'] = $request->pendidikan;
            $validatedData['agama'] = $request->agama;
        }

        if($request->file("foto")) {
            $validatedData["foto"] = $request->file('foto')->store('pegawai');
        }

        Pegawai::create($validatedData);

        return redirect("/page/admin/pemerintahan/pegawai/")->with('message', "<script>swal('Selamat!', 'Data anda berhasil ditambahkan', 'success')</script>");
    }

    public function edit($id)
    {
        $data = [
            "edit" => Pegawai::where("id", $id)->first(),
            "data_pendidikan_kk" => PendudukPendidikanKK::orderBy("nama", "DESC")->get(),
            "data_agama" => PendudukAgama::orderBy("nama", "DESC")->get()
        ];

        return view("/admin/page/pemerintahan/pegawai/form_edit_data_pegawai", $data);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            "nama" => "required",
            "nip" => "required",
            "foto" => "image|file|max:1024"
        ]);

        if($request->file("foto")) {

            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validatedData["foto"] = $request->file('foto')->store('pegawai');
        }

        Pegawai::where("id", $id)->update($validatedData);

        return redirect("/page/admin/pemerintahan/pegawai")->with('message', "<script>swal('Selamat!', 'Data anda berhasil diubah', 'success')</script>");
    }

    public function destroy(Request $request, $id)
    {
        if ($request->foto) {
            Storage::delete($request->image);
        }

        Pegawai::where("id", $id)->delete();

        return back()->with('message', "<script>swal('Selamat!', 'Data anda berhasil dihapus', 'success')</script>");
    }

    public function data(Request $request)
    {
        $data = [
            "data_pendidikan_kk" => PendudukPendidikanKK::orderBy("nama", "DESC")->get(),
            "data_agama" => PendudukAgama::orderBy("nama", "DESC")->get(),
            "data_penduduk" => Penduduk::all(),
            "data_sex" => PendudukSex::all(),
            "detail" => Penduduk::where("id", $request->id_pend)->first()
        ];

        return view("/admin/page/pemerintahan/pegawai/form_tambah_data_pegawai", $data);
    }
}
