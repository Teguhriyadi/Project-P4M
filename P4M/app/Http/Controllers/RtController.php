<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Model\Rt;
use App\Models\model\Rw;

class RtController extends Controller
{
    public function index()
    {
        $data = [
            "data_rt" => Rt::orderBy("created_at", "DESC")->get(),
            "data_rw" => Rw::all()
        ];

        return view("/admin/page/penduduk/rt/data_rt", $data);
    }

    public function store(Request $request)
    {
        Rt::create($request->all());

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Tambahkan', 'success')</script>");
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => Rt::where("id", $request->id)->first(),
            "data_rw" => Rw::all()
        ];

        return view("/admin/page/penduduk/rt/edit_data_rt", $data);
    }

    public function update(Request $request)
    {
        Rt::where("id", $request->id)->update([
            "rt" => $request->rt,
            "id_rw" => $request->id_rw
        ]);

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Ubah', 'success')</script>");
    }

    public function destroy($id)
    {
        Rt::where("id", $id)->delete();

        return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Hapus', 'success')</script>");
    }
}
