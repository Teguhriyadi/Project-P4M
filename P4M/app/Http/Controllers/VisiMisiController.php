<?php

namespace App\Http\Controllers;

use App\Models\Model\VisiMisi;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    public function index()
    {
        $data = [
            "data_visi_misi" => VisiMisi::orderBy("created_at", "DESC")->paginate(1)
        ];

        return view("admin/page/visi_misi/index", $data);
    }

    public function store(Request $request)
    {
        VisiMisi::create($request->all());

<<<<<<< HEAD
        return back()->with('message', "<script>swal('Selamat!', 'Data visi & misi berhasil ditambahkan', 'success')</script>");
=======
        return back()->with('message', "<script>swal('Selamat!', 'Data anda berhasil ditambahkan', 'success')</script>");
>>>>>>> 43c6e2202880298e49c897c6e47d6d6a22ca5a34
    }

    public function update(Request $request, VisiMisi $visiMisi)
    {
        VisiMisi::where("id", $visiMisi->id)->update([
            "visi" => $request->visi,
            "misi" => $request->misi
        ]);

<<<<<<< HEAD
        return back()->with('message', "<script>swal('Selamat!', 'Data visi & misi berhasil diubah', 'success')</script>");
=======
        return back()->with('message', "<script>swal('Selamat!', 'Data anda berhasil diubah', 'success')</script>");
>>>>>>> 43c6e2202880298e49c897c6e47d6d6a22ca5a34
    }
}
