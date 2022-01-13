<?php

namespace App\Http\Controllers;

use App\Models\Model\Dusun;
use Illuminate\Http\Request;

class DusunController extends Controller
{
    public function index()
    {
        $data = [
            "data_dusun" => Dusun::orderBy("created_at", "DESC")->get()
        ];

        return view("/admin/page/penduduk/dusun/data_dusun", $data);
    }

    public function store(Request $request)
    {
        Dusun::create($request->all());

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Tambahkan', 'success')</script>");
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => Dusun::where("id", $request->id)->first()
        ];

        return view("/admin/page/penduduk/dusun/edit_data_dusun", $data);
    }

    public function update(Request $request)
    {
        Dusun::where("id", $request->id)->update([
            "dusun" => $request->dusun
        ]);

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Ubah', 'success')</script>");
    }

    public function destroy($id)
    {
        Dusun::where("id", $id)->delete();

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Hapus', 'success')</script>");
    }
}
