<?php

namespace App\Http\Controllers;

use App\Models\Model\Geografis;
use Illuminate\Http\Request;

class GeografisController extends Controller
{
    public function index()
    {
        $data = [
            "data_geografis" => Geografis::select("id", "deskripsi")->first()
        ];

        return view("/admin/page/info/geografis/data_geografis", $data);
    }

    public function store(Request $request)
    {
        Geografis::create([
            "deskripsi" => $request->deskripsi
        ]);

        return back()->with('message', "<script>swal('Selamat!', 'Data anda berhasil ditambahkan', 'success')</script>");
    }

    public function update(Request $request, $id)
    {
        Geografis::where("id", $id)->update([
            "deskripsi" => $request->deskripsi
        ]);

        return back()->with('message', "<script>swal('Selamat!', 'Data anda berhasil diubah', 'success')</script>");
    }
}
