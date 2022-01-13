<?php

namespace App\Http\Controllers;

use App\Models\Model\Jabatan;
use App\Models\Model\Pegawai;
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
            "data_pegawai" => Pegawai::orderBy("nama", "DESC")->get()
        ];

        return view("admin/page/pemerintahan/struktur_pemerintahan/index", $data);
    }

    public function store(Request $request)
    {
        $get = $request->staf_id;

        $ambil = StrukturPemerintahan::where("jabatan_id", $get)->first();
        $j_data = new StrukturPemerintahan;

        if ($j_data->count()) {
            if ($ambil == NULL) {
                $id_staf = $get;
            } else {
                $id_staf = $ambil->id;
            }
        } else {
            $id_staf = 0;
        }

        StrukturPemerintahan::create([
            "jabatan_id" => $request->jabatan_id,
            "pegawai_id" => $request->pegawai_id,
            "staf_id" => $id_staf
        ]);

        return back()->with('message', "<script>swal('Selamat!', 'Data anda berhasil ditambahkan', 'success')</script>");

    }

    public function edit($id)
    {
        $data = [
            "edit" => StrukturPemerintahan::where("id", $id)->first(),
            "data_struktur" => StrukturPemerintahan::where("id", "!=", $id)->orderBy("id", "DESC")->get(),
            "data_jabatan" => Jabatan::orderBy("nama_jabatan", "DESC")->get(),
            "data_pegawai" => Pegawai::orderBy("nama", "DESC")->get()
        ];

        return view("admin/page/pemerintahan/struktur_pemerintahan/edit", $data);
    }

    public function update(Request $request, $id)
    {
        StrukturPemerintahan::where("id", $id)->update([
            "jabatan_id" => $request->jabatan_id,
            "pegawai_id" => $request->pegawai_id
        ]);

        return back()->with('message', "<script>swal('Selamat!', 'Data anda berhasil diubah', 'success')</script>");
    }

    public function destroy($id)
    {
        StrukturPemerintahan::where("id", $id)->delete();

        return back()->with('message', "<script>swal('Selamat!', 'Data anda berhasil dihapus', 'success')</script>");
    }

    public function show()
    {
        $data = [
            "data_struktur" => StrukturPemerintahan::orderBy("id", "asc")->get()
        ];

        return view("admin/page/pemerintahan/struktur_pemerintahan/show", $data);
    }
}
