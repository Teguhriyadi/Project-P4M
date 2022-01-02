<?php

namespace App\Http\Controllers;

use App\Models\Model\Jabatan;
use App\Models\Model\Pegawai;
use App\Models\Model\Staf;
use App\Models\Model\StrukturPemerintahan;
use Dotenv\Util\Str;
use Illuminate\Http\Request;

class StrukturPemerintahanController extends Controller
{
    public function index()
    {
        $data = [
            "data_struktur" => StrukturPemerintahan::orderBy("id", "DESC")->get(),
            "data_jabatan" => Jabatan::orderBy("nama_jabatan", "DESC")->get(),
            "data_pegawai" => Pegawai::orderBy("nama", "DESC")->get(),
            "data_staf" => Staf::orderBy("staf", "DESC")->get()
        ];

        return view("admin/page/struktur_pemerintahan/index", $data);
    }

    public function store(Request $request)
    {
        StrukturPemerintahan::create($request->all());

        return back()->with('message', "<script>swal('Selamat!', 'Data anda berhasil ditambahkan', 'success')</script>");
    }

    public function edit($id)
    {
        $data = [
            "edit" => StrukturPemerintahan::where("id", $id)->first(),
            "data_struktur" => StrukturPemerintahan::where("id", "!=", $id)->orderBy("id", "DESC")->get(),
            "data_jabatan" => Jabatan::orderBy("nama_jabatan", "DESC")->get(),
            "data_pegawai" => Pegawai::orderBy("nama", "DESC")->get(),
            "data_staf" => Staf::orderBy("staf", "DESC")->get()
        ];

        return view("admin/page/struktur_pemerintahan/edit", $data);
    }

    public function update(Request $request, $id)
    {
        StrukturPemerintahan::where("id", $id)->update([
            "jabatan_id" => $request->jabatan_id,
            "pegawai_id" => $request->pegawai_id,
            "staf_id" => $request->staf_id
        ]);

        return back()->with('message', "<script>swal('Selamat!', 'Data anda berhasil diubah', 'success')</script>");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model\StrukturPemerintahan  $strukturPemerintahan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        StrukturPemerintahan::where("id", $id)->delete();

        return back()->with('message', "<script>swal('Selamat!', 'Data anda berhasil dihapus', 'success')</script>");
    }
}
