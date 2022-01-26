<?php

namespace App\Http\Controllers;

use App\Models\Model\SakitMenahun;
use Illuminate\Http\Request;

class SakitMenahunController extends Controller
{
    public function index()
    {
        $data = [
            "data_sakit_menahun" => SakitMenahun::orderBy("nama", "DESC")->get()
        ];

        return view("/admin/page/penduduk/sakit_menahun/data_sakit_menahun", $data);
    }

    public function store(Request $request)
    {
        SakitMenahun::create($request->all());

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Tambahkan', 'success')</script>");
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => SakitMenahun::where("id", $request->id)->first()
        ];

        return view("/admin/page/penduduk/sakit_menahun/edit_data_sakit_menahun", $data);
    }

    public function update(Request $request)
    {
        SakitMenahun::where("id", $request->id)->update([
            "nama" => $request->nama
        ]);

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Ubah', 'success')</script>");
    }

    public function destroy($id)
    {
        SakitMenahun::where("id", $id)->delete();

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Hapus', 'success')</script>");
    }
}
