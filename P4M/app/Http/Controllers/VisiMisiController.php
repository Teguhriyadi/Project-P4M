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

        return back();
    }

    public function update(Request $request, VisiMisi $visiMisi)
    {
        VisiMisi::where("id", $visiMisi->id)->update([
            "visi" => $request->visi,
            "misi" => $request->misi
        ]);

        return back();
    }
}
