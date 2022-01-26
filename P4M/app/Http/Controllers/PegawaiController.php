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
            "data_penduduk" => Penduduk::all(),
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

    }

    public function update(Request $request, $id)
    {

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

    public function luar($id)
    {
        $data = [
            "edit" => Pegawai::where("id", $id)->first(),
            "data_pendidikan_kk" => PendudukPendidikanKK::orderBy("nama", "DESC")->get(),
            "data_sex" => PendudukSex::all(),
            "data_agama" => PendudukAgama::orderBy("nama", "DESC")->get()
        ];

        return view("admin.page.pemerintahan.pegawai.edit_pegawai_luar", $data);
    }

    public function dalam($id)
    {
        $data = [
            "edit" => Pegawai::where("id", $id)->first(),
            "data_pendidikan_kk" => PendudukPendidikanKK::orderBy("nama", "DESC")->get(),
            "data_sex" => PendudukSex::all(),
            "data_agama" => PendudukAgama::orderBy("nama", "DESC")->get()
        ];

        $data['penduduk'] = Penduduk::where('id', $data['edit']->id_penduduk)->first();

        return view("admin.page.pemerintahan.pegawai.edit_pegawai_dalam", $data);
    }

    public function updateDalam(Request $request, $id)
    {
        $pegawai = Pegawai::where('id', $id)->first();
        $penduduk = Penduduk::where('id', $pegawai->id_penduduk)->first();

        $pegawaiUpdate = [
            'nip' => $request->nip,
            'pangkat' => $request->pangkat,
            'no_sk' => $request->no_sk,
            'tgl_sk' => $request->tgl_sk,
            'no_henti' => $request->no_henti,
            'tgl_henti' => $request->tgl_henti,
            'masa_jabatan' => $request->masa_jabatan,
            'alamat' => $request->alamat,
        ];

        if($request->file("foto")) {

            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $pegawai["foto"] = $request->file('foto')->store('pegawai');
        }

        Pegawai::where('id', $pegawai->id)->update($pegawaiUpdate);
        Penduduk::where('id', $penduduk->id)->update([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'id_sex' => $request->sex,
            'id_pendidikan' => $request->pendidikan,
            'id_agama' => $request->agama,
            'telepon' => $request->no_hp,
        ]);

        return redirect('page/admin/pemerintahan/pegawai')->with('message', "<script>swal('Selamat!', 'Data anda berhasil diubah', 'success')</script>");
    }

    public function updateLuar(Request $request, $id)
    {
        // dd($request);
        $pegawai = Pegawai::where('id', $id)->first();

        $pegawaiUpdate = [
            'nip' => $request->nip,
            'pangkat' => $request->pangkat,
            'no_sk' => $request->no_sk,
            'tgl_sk' => $request->tgl_sk,
            'no_henti' => $request->no_henti,
            'tgl_henti' => $request->tgl_henti,
            'masa_jabatan' => $request->masa_jabatan,
            'alamat' => $request->alamat,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'sex' => $request->sex,
            'pendidikan' => $request->pendidikan,
            'agama' => $request->agama,
            'no_hp' => $request->no_hp,
        ];

        if($request->file("foto")) {

            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $pegawai["foto"] = $request->file('foto')->store('pegawai');
        }

        Pegawai::where('id', $pegawai->id)->update($pegawaiUpdate);

        return redirect('page/admin/pemerintahan/pegawai')->with('message', "<script>swal('Selamat!', 'Data anda berhasil diubah', 'success')</script>");
    }
}
