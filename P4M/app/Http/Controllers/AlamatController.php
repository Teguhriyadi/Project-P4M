<?php

namespace App\Http\Controllers;

use App\Models\Model\Alamat;
use Illuminate\Http\Request;

class AlamatController extends Controller
{
    public function index()
    {
        $data = [
            "data_alamat" => Alamat::orderBy("created_at", "DESC")->paginate(1)
        ];

        return view("admin/page/alamat/index", $data);
    }

    public function store(Request $request)
    {
        Alamat::create($request->all());

        return redirect()->back()->with('message', "<script>swal('Selamat!', 'Alamat Berhasil Ditambahkan', 'success')</script>");
    }

    public function update(Request $request, Alamat $alamat)
    {
        Alamat::where("id", $alamat->id)->update([
            "website" => $request->website,
            "no_telepon" => $request->no_telepon,
            "alamat" => $request->alamat
        ]);

        return redirect()->back()->with('message', "<script>swal('Selamat!', 'Alamat Berhasil Diperbaharui', 'success')</script>");
    }

}
